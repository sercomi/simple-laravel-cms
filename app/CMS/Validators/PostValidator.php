<?php namespace CMS\Validators;

/**
* Session Validator
*/
class PostValidator extends Validator
{
    protected static $rules = [
        'title' => 'required',
        'content' => 'required',
        'slug' => 'unique:posts,slug,:id',
        'status' => 'required',
    ];
}
