<?php namespace Admin;

use View, Input, Redirect, Auth;

use CMS\Repositories\PostRepositoryInterface;
use CMS\Validators\PostValidator;
use CMS\Presenters\PresenterCollection;
use CMS\Presenters\PostPresenter;

class PostsController extends \BaseController {

	protected $post;

	public function __construct()
	{
	    $this->post = \App::make('CMS\Repositories\PostRepositoryInterface', $this);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Auth::user()->posts;

        return View::make('admin.posts.index')
        	->with(
        		'posts',
        		new PresenterCollection('CMS\Presenters\PostPresenter', $posts)
        	);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin.posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		return $this->post->create(Input::all());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('admin.posts.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = $this->post->getById($id);
        return View::make('admin.posts.edit')->with('post', new PostPresenter($post));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		return $this->post->update($id, Input::all());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->post->delete($id);
		return Redirect::route('dashboard')->with([
			'flash_message' => trans('admin.posts.deleted'),
			'flash_type' => 'alert-success'
		]);
	}

	public function saveFails($errors)
	{
		return Redirect::back()
                    ->withInput()
                    ->withErrors($errors);
	}

	public function creationSucceeds()
	{
		return Redirect::route('admin.posts.index')->with([
			'flash_message' => trans('admin.posts.created'),
			'flash_type' => 'success'
		]);
	}

	public function updateSucceeds()
	{
		return Redirect::route('admin.posts.index')->with([
			'flash_message' => trans('admin.posts.updated'),
			'flash_type' => 'success'
		]);
	}

	public function deletionSucceeds()
	{
		return Redirect::route('admin.posts.index')->with([
			'flash_message' => trans('admin.posts.deleted'),
			'flash_type' => 'success'
		]);
	}
}
