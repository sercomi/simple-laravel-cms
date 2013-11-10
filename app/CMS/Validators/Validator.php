<?php namespace CMS\Validators;

use Validator as V;

abstract class Validator
{
    protected $errors;

    public function isValid(array $attributes, $id = null)
    {

        $rules = static::$rules;
        if ($id) {
            $rules = str_replace(':id', $id, $rules);
        }

        $v = V::make($attributes, $rules);

        if ($v->fails()) {

            $this->errors = $v->messages();
            return false;
        }

        return true;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
