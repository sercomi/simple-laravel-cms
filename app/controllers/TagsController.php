<?php

use CMS\Repositories\TagRepositoryInterface;
use CMS\Presenters\PresenterCollection;
use CMS\Presenters\PostPresenter;

class TagsController extends BaseController {

	protected $tags;

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
        return View::make('tags.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('tags.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  string  $id
	 * @return Response
	 */
	public function show($id)
	{
		$posts = $this->tag->getPostsByTagSlug($id);
		$tags = $this->tag->getAllWithPosts();
        return View::make('tags.show')->with(
        	[
        		'tag' => $id,
        		'posts' => new PresenterCollection('CMS\Presenters\PostPresenter', $posts),
				'tags' => new PresenterCollection('CMS\Presenters\TagPresenter', $tags),
        	]
        );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('tags.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
