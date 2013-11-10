<?php

use CMS\Repositories\PostRepositoryInterface;
use CMS\Repositories\TagRepositoryInterface;
use CMS\Presenters\PresenterCollection;
use CMS\Presenters\PostPresenter;

class PostsController extends BaseController {

	protected $post;
	protected $tag;

	public function __construct(PostRepositoryInterface $post)
	{
		$this->post = \App::make('CMS\Repositories\PostRepositoryInterface', $this);
		$this->tag = \App::make('CMS\Repositories\TagRepositoryInterface', $this);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = $this->post->getAllPublished();
		$tags = $this->tag->getAllWithPosts();
        return View::make('posts.index')
        	->with(
        	[
        		'posts' => new PresenterCollection('CMS\Presenters\PostPresenter', $posts),
				'tags' => new PresenterCollection('CMS\Presenters\TagPresenter', $tags),
        	]
        	);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('posts.create');
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
	 * @param  string  $slug
	 * @return Response
	 */
	public function show($slug)
	{
		$post = $this->post->getBySlug($slug);
		$tags = $this->tag->getAllWithPosts();
        return View::make('posts.show')
        	->with(
        	[
        		'post' => new PostPresenter($post),
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
        return View::make('posts.edit');
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
