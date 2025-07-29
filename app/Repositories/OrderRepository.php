<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Interfaces\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{

   
    public function list()
    {
        return Order::all();
    }
    public function getById($id)
    {
        return Order::findOrFail($id);
    }
    public function store(array $data)
    {
        return Order::create($data);
    }
    public function update(array $data, $id)
    {
        return Order::where('id','=',$id)->update($data);
    }
    public function delete($id)
    {
        return Order::destroy($id);
    }

}
