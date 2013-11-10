<?php namespace Admin;

use View, Input, Redirect, Auth, Mail, Queue;

class TagsController extends \BaseController {

	protected $tag;

	public function __construct()
	{
	    $this->tag = \App::make('CMS\Repositories\TagRepositoryInterface', $this);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tags = $this->tag->getAll();
        return View::make('admin.tags.index')->withTags($tags);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin.tags.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		return $this->tag->create( Input::all() );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('admin.tags.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tag = $this->tag->getById($id);
        return View::make('admin.tags.edit')->withTag($tag);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		return $this->tag->update( $id, Input::all() );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return $this->tag->delete($id);

	}

	public function creationSucceeds()
	{
		return Redirect::route('admin.tags.index')->with([
			'flash_message' => trans('admin.tags.created'),
			'flash_type' => 'success'
		]);
	}

	public function updateSucceeds()
	{
		return Redirect::route('admin.tags.index')->with([
			'flash_message' => trans('admin.tags.updated'),
			'flash_type' => 'success'
		]);
	}

	public function deletionSucceeds()
	{
		return Redirect::route('admin.tags.index')->with([
			'flash_message' => trans('admin.tags.deleted'),
			'flash_type' => 'alert-success'
		]);
	}

	public function saveFails($errors)
	{
		return Redirect::back()
                    ->withInput()
                    ->withErrors($errors);
	}
}
