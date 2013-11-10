<?php namespace Admin;

use View, Input, Redirect, Auth, Mail, Queue;

class UsersController extends \BaseController {

	protected $user;

	public function __construct()
	{
	    $this->user = \App::make('CMS\Repositories\UserRepositoryInterface', $this);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('admin.users.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin.users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		return $this->user->create(Input::all());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('admin.users.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if ($id != Auth::user()->id) {
			throw new Exception("Page not found", -1);
		}

		$user = $this->user->getById($id);
        return View::make('admin.users.edit')->withUser($user);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if ($id != Auth::user()->id) {
			throw new Exception("Page not found", -1);
		}

		return $this->user->update($id, Input::all());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->user->delete($id);
	}

	public function creationSucceeds()
	{
		return Redirect::route('admin.posts.index')->with([
			'flash_message' => trans('admin.users.created'),
			'flash_type' => 'success'
		]);
	}

	public function updateSucceeds()
	{
		return Redirect::route('admin.posts.index')->with([
			'flash_message' => trans('admin.users.updated'),
			'flash_type' => 'success'
		]);
	}

	public function deletionSucceeds()
	{
		return Redirect::route('admin.posts.index')->with([
			'flash_message' => trans('admin.users.deleted'),
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
