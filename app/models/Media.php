<?php

class Media extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'media';

	protected $guarded = array('id', 'created_at', 'updated_at');

	public static $rules = array();
}
