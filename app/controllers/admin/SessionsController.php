<?php namespace Admin;

use View, Input, Redirect, Auth, Mail, Queue;

use CMS\Repositories\PostRepositoryInterface;
use CMS\Validators\SessionValidator;

class SessionsController extends \BaseController {

	protected $validator;

	public function __construct(SessionValidator $validator)
	{
	    $this->validator = $validator;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin.sessions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		if ( ! $this->validator->isValid($input)) {
			return Redirect::back()
					->withInput()
					->withErrors($this->validator->getErrors());
		}

		if ( Auth::attempt([
			'login' => $input['login'],
			'password' => $input['password'],
			'active' => true,
			'hash' => null
		])) {

			// Mail::queue('emails.welcome', array(), function($message) {
			// 	$message->to('sercomi@gmail.com', 'Sergi Comas')->subject('Test');
			// });

			return Redirect::intended('admin/dashboard');
		}

		return Redirect::back()->with([
			'flash_message' => trans('admin.sessions.invalid'),
			'flash_type' => 'danger'
		]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();
		return Redirect::route('login');
	}

}
