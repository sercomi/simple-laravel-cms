<?php

use CMS\Helpers;

class Post extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

	protected $guarded = array('id', 'status', 'created_at', 'updated_at');

	public static $rules = array(
        'title' => 'required',
        'content' => 'required',
    );

    public static function boot()
    {
        parent::boot();

        static::saving(function($model){
            if (empty($model->excerpt)) {
                $model->excerpt = Helpers::excerpt(strip_tags($model->content));
            }

            if (empty($model->excerpt)) {
                $model->excerpt = Helpers::excerpt(strip_tags($model->content));
            }
        });
    }

    public function setSlugAttribute($value)
    {
        $slug = Str::slug($value);
        $slugCount = count( $this->whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'")->get() );
        $slugFinal = ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
        $this->attributes['slug'] = $slugFinal;
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function tags()
    {
        return $this->belongsToMany('Tag', 'post_tag');
    }
}
