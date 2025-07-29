<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{

    public function list();
    public function getById($id);
    public function store(array $data);
    public function update(array $data,$id);
    public function delete($id);
}