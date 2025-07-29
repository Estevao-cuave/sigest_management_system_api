<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{

    public function list()
    {
        return User::all();
    }
    public function getById($id)
    {
        return User::findOrFail($id);
    }
    public function store(array $data)
    {
        return User::create($data);
    }
    public function update(array $data, $id)
    {
        return User::where('id','=',$id)->update($data);
    }
    public function delete($id)
    {
        return User::destroy($id);
    }

}
