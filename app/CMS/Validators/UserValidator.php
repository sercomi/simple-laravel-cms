<?php namespace CMS\Validators;

/**
* Session Validator
*/
class UserValidator extends Validator
{
    protected static $rules = [
        'login' => 'required|unique:users,login,:id',
        'password' => 'required|confirmed',
    ];

    public function isValidForUpdate($data, $id = null)
    {

        if (empty($data['password'])) {
            static::$rules['password'] = '';
        }

        return $this->isValid($data, $id);
    }
}
