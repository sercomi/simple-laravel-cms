<?php namespace CMS\Repositories;

use Post;
use Tag;
use Auth;
use CMS\Helpers;

/**
* Eloquent Post Repository
*/
class EloquentPostRepository implements PostRepositoryInterface
{
    protected $listener;
    protected $validator;

    public function __construct($listener)
    {
        $this->listener = $listener;
        $this->validator = \App::make('\CMS\Validators\PostValidator');
    }

    public function getAll()
    {
        return Post::all();
    }

    public function getAllByUser($user)
    {
        return Post::where('user_id', $user)->get();
    }

    public function getAllPublished()
    {
        return Post::where('status', 'publish')->orderBy('created_at', 'desc')->get();
    }

    public function getById($id)
    {
        return Post::findOrFail($id);
    }

    public function getBySlug($slug)
    {
        return Post::where('slug', $slug)->firstOrFail();
    }

    public function create($input)
    {
        if ( ! $this->validator->isValid($input)) {
            return $this->listener->saveFails($this->validator->getErrors());
        }

        $post = Post::create([
            'title' =>  $input['title'],
            'rawContent' => $input['content'],
            'content' => Helpers::parseMarkdown($input['content']),
            'slug' => $input['slug'],
            'status' => $input['status'],
            'user_id' => Auth::user()->id
        ]);

        if ( ! empty($input['tags'])) {
            $tags = explode(',', $input['tags']);
            $tagsCollection = array();
            foreach ($tags as $inputTag) {
                $tag = Tag::where('name', $inputTag)->first();
                if ( ! $tag) {
                    $tag = Tag::create([
                        'name' => trim($inputTag)
                    ]);
                }
                $tagsCollection[] = $tag->id;

            }
            $post->tags()->sync($tagsCollection);
        }

        return $this->listener->creationSucceeds();
    }

    public function update($id, $input)
    {

        if ( ! $this->validator->isValid($input, $id)) {
            return $this->listener->saveFails($this->validator->getErrors());
        }

        $post = Post::find($id);
        $post->title = $input['title'];
        $post->rawContent = $input['content'];
        $post->content = Helpers::parseMarkdown($input['content']);
        $post->slug = $input['slug'];
        $post->status = $input['status'];

        if ( ! empty($input['tags'])) {
            $tags = explode(',', $input['tags']);
            $tagsCollection = array();
            foreach ($tags as $inputTag) {
                $tag = Tag::where('name', $inputTag)->first();
                if ( ! $tag) {
                    $tag = Tag::create([
                        'name' => trim($inputTag)
                    ]);
                }
                $tagsCollection[] = $tag->id;
            }
            $post->tags()->sync($tagsCollection);
        }

        $post->save();

        return $this->listener->creationSucceeds();
    }

    public function delete($id)
    {
        Post::destroy($id);

        return $this->listener->deletionSucceeds();
    }
}
