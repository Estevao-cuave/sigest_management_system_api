<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{

    public function list()
    {
        return Category::all();
    }
    public function getById($id)
    {
        return Category::findOrFail($id);
    }
    public function store(array $data)
    {
        return Category::create($data);
    }
    public function update(array $data, $id)
    {
        return Category::where('id','=',$id)->update($data);
    }
    public function delete($id)
    {
        return Category::destroy($id);
    }

}
