<?php namespace CMS\Validators;

/**
* Session Validator
*/
class MediaValidator extends Validator
{
    protected static $rules = [
        'title' => 'required',
        'file' => 'required',
    ];
}
