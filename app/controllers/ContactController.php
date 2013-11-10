<?php

class ContactController extends BaseController {

	protected $contact;

	public function __construct()
	{
	    $this->contact = \App::make('CMS\Repositories\ContactRepositoryInterface', $this);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('contacts.index');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		return $this->contact->send(Input::all());
	}

	public function creationSucceeds()
	{
		return Redirect::route('contact.index')->with([
			'flash_message' => trans('contact.sended'),
			'flash_type' => 'success'
		]);
	}

	public function saveFails($errors)
	{
		return Redirect::back()
                    ->withInput()
                    ->withErrors($errors);
	}
}
