<?php

namespace App\Repositories;

use App\Models\consumable;
use App\Repositories\Interfaces\ConsumableRepositoryInterface;

class ConsumableRepository implements ConsumableRepositoryInterface
{

    public function list()
    {
        return consumable::all();
    }
    public function getById($id)
    {
        return consumable::findOrFail($id);
    }
    public function store(array $data)
    {
        return consumable::create($data);
    }
    public function update(array $data, $id)
    {
        return consumable::where('id','=',$id)->update($data);
    }
    public function delete($id)
    {
        return consumable::destroy($id);
    }

}
