<?php

use CMS\Helpers;

class Tag extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tags';

	protected $guarded = array('id');

	public static $rules = array(
        'name' => 'required',
    );

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::saving(function($model){
            if (empty($model->type)) {
                $model->type = 'tag';
            }

            if (empty($model->slug)) {
                $model->slug = Str::slug($model->name);
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

    public function posts()
    {
        return $this->belongsToMany('Post', 'post_tag');
    }
}
