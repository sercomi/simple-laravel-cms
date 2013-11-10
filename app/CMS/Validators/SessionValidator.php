<?php namespace CMS\Validators;

/**
* Session Validator
*/
class SessionValidator extends Validator
{
    protected static $rules = [
        'login' => 'required',
        'password' => 'required',
    ];
}
