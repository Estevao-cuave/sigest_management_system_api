<?php

namespace App\Repositories;

use App\Models\supplier;
use App\Repositories\Interfaces\SupplierRepositoryInterface;

class SupplierRepository implements SupplierRepositoryInterface
{


    public function list()
    {
        return supplier::all();
    }
    public function getById($id)
    {
        return supplier::findOrFail($id);
    }
    public function store(array $data)
    {
        return supplier::create($data);
    }
    public function update(array $data, $id)
    {
        return supplier::where('id','=',$id)->update($data);
    }
    public function delete($id)
    {
        return supplier::destroy($id);
    }

}
