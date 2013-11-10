<?php namespace CMS\Validators;

/**
* Contact Validator
*/
class ContactValidator extends Validator
{
    protected static $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required',
    ];
}
