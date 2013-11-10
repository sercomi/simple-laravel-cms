<?php namespace CMS\Repositories;

/**
* Post Repository Interface
*/
interface PostRepositoryInterface
{
    public function getAll();
    public function getAllByUser($user);
    public function getAllPublished();
    public function getById($id);
    public function getBySlug($slug);
    public function create($input);
    public function update($id, $input);
    public function delete($id);
}
