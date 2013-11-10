<?php namespace CMS\Repositories;

interface TagRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function getBySlug($slug);
    public function create($data);
    public function update($id, $data);
    public function delete($id);
}
