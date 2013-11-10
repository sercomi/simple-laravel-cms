<?php namespace Admin;

use View;
use Redirect;
use Input;
use Media;
use CMS\Presenters\PresenterCollection;

class MediaController extends \BaseController {

	protected $media;

	public function __construct()
	{
	    $this->media = \App::make('CMS\Repositories\MediaRepositoryInterface', $this);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$medias = $this->media->getAll();
        return View::make('admin.medias.index')->with(
        	'medias',
        	new PresenterCollection('CMS\Presenters\MediaPresenter', $medias)
        );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin.medias.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		return $this->media->create(Input::all());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return $this->media->delete($id);
	}

	public function creationSucceeds()
	{
		return Redirect::route('admin.media.index')->with([
			'flash_message' => trans('admin.medias.created'),
			'flash_type' => 'success'
		]);
	}

	public function deletionSucceeds()
	{
		return Redirect::route('admin.media.index')->with([
			'flash_message' => trans('admin.medias.deleted'),
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
