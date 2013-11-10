<?php namespace CMS\Repositories;

interface UserRepositoryInterface
{
    public function getById($id);
    public function getByLogin($login);
    public function create($data);
    public function update($id, $data);
    public function delete($id);
}
