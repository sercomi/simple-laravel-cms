<?php namespace CMS\Repositories;

interface MediaRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function create($data);
    public function delete($id);
}
