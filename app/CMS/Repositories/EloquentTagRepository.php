<?php namespace CMS\Repositories;

use Tag;

/**
* Tag Repository
*/
class EloquentTagRepository implements TagRepositoryInterface
{
    protected $listener;
    protected $validator;

    public function __construct($listener)
    {
        $this->listener = $listener;
        $this->validator = \App::make('\CMS\Validators\TagValidator');
    }

    public function getAll()
    {
        return Tag::all();
    }

    public function getById($id)
    {
        return Tag::findOrFail($id);
    }

    public function getBySlug($slug)
    {
        return Tag::where('slug', $slug)->first();
    }

    public function getAllWithPosts()
    {
        return Tag::with('posts')->get();
    }

    public function getPostsByTagSlug($slug)
    {
        $tags = Tag::with('posts')->where('slug', $slug)->first();

        return $tags->posts;
    }

    public function create($data)
    {
        if ( ! $this->validator->isValid($data)) {
            return $this->listener->saveFails($this->validator->getErrors());
        }

        Tag::create([
            'name' => $data['name'],
            'type' => $data['type'],
            'description' => $data['description'],
            'slug' => $data['slug'],
        ]);

        return $this->listener->creationSucceeds();
    }

    public function update($id, $data)
    {
        if ( ! $this->validator->isValid($data, $id)) {
            return $this->listener->saveFails($this->validator->getErrors());
        }

        $tag = Tag::findOrFail($id);

        $tag->name = $data['name'];
        $tag->type = $data['type'];
        $tag->description = $data['description'];
        $tag->slug = $data['slug'];

        $tag->save();

        return $this->listener->updateSucceeds();
    }

    public function delete($id)
    {
        Tag::destroy($id);
        return $this->listener->deletionSucceeds();
    }
}
