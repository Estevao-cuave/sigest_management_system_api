<?php

namespace App\Repositories;

use App\Models\Department;
use App\Repositories\Interfaces\DepartmentRepositoryInterface;

class DepartmentRepository implements DepartmentRepositoryInterface
{

    public function list()
    {
        return Department::all();
    }
    public function getById($id)
    {
        return Department::findOrFail($id);
    }
    public function store(array $data)
    {
        return Department::create($data);
    }
    public function update(array $data, $id)
    {
        return Department::where('id','=',$id)->update($data);
    }
    public function delete($id)
    {
        return Department::destroy($id);
    }

}
