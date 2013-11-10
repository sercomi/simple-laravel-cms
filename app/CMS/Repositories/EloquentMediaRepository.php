<?php namespace CMS\Repositories;

use Media;
use CMS\Helpers;

/**
* Eloquent Post Repository
*/
class EloquentMediaRepository implements MediaRepositoryInterface
{
    protected $listener;
    protected $validator;

    public function __construct($listener)
    {
        $this->listener = $listener;
        $this->validator = \App::make('\CMS\Validators\MediaValidator');
    }

    public function getAll()
    {
        return Media::all();
    }

    public function getById($id)
    {
        return Media::find($id);
    }

    public function create($data)
    {
        if ( ! $this->validator->isValid($data)) {
            return $this->listener->saveFails($this->validator->getErrors());
        }

        $destinationPath = \Config::get('alvl.uploads');
        $fileName = \Str::slug($data['title']) . "." . $data['file']->getClientOriginalExtension();
        $fileurl = \Config::get('alvl.siteurl') . $destinationPath . $fileName;
        $data['file']->move($destinationPath, $fileName);

        Media::create([
            'title' => $data['title'],
            'file' => $fileName,
            'url' => $fileurl,
        ]);

        return $this->listener->creationSucceeds();
    }

    public function delete($id)
    {
        $media = $this->getById($id);
        $destinationPath = \Config::get('alvl.uploads');
        unlink($destinationPath . $media->file);
        $media->delete();
        return $this->listener->deletionSucceeds();
    }
}
