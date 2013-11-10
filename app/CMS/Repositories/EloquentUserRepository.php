<?php namespace CMS\Repositories;

use User;

/**
* Eloquent User Repository
*/
class EloquentUserRepository implements UserRepositoryInterface
{
    protected $listener;
    protected $validator;

    public function __construct($listener)
    {
        $this->listener = $listener;
        $this->validator = \App::make('\CMS\Validators\UserValidator');
    }

    public function getById($id)
    {
        return User::findOrFail($id);
    }

    public function getByLogin($login)
    {
        return User::where('login', $login)->first();
    }

    public function create($data)
    {
        if ( ! $this->validator->isValid($data)) {
            return $this->listener->saveFails($this->validator->getErrors());
        }

        User::create([
            'login' => $data['login'],
            'password' => \Hash::make($data['password']),
            'name' => $data['name'],
            'surname' => $data['surname'],
        ]);

        return $this->listener->creationSucceeds();
    }

    public function update($id, $data)
    {
        if ( ! $this->validator->isValidForUpdate($data, $id)) {
            return $this->listener->saveFails($this->validator->getErrors());
        }

        $user = $this->getById($id);
        $user->login = $data['login'];
        if ( ! empty($data['password'])) {
            $user->password = \Hash::make($data['password']);
        }
        $user->name = $data['name'];
        $user->surname = $data['surname'];

        $user->save();

        return $this->listener->updateSucceeds();
    }

    public function delete($id)
    {
        $user = $this->getById($id);
        $user->delete();

        return $this->listener->deletionSucceeds();
    }
}
