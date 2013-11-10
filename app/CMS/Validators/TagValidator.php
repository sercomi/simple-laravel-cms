<?php namespace CMS\Validators;

/**
* Tag Validator
*/
class TagValidator extends Validator
{
    protected static $rules = [
        'name' => 'required',
        'slug' => 'unique:tags,slug,:id',
    ];
}
