<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use Exception;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\JsonResponse;
use JsonException;

class OrderController extends Controller
{

    protected $orderRepo;

    public function __construct(OrderRepositoryInterface $orderRepo){
        $this->orderRepo = $orderRepo;
    }

    public function createOrder(StoreOrderRequest $request)
    {
     
        
    }


    public function getAllOrder()
    {
       
    }


    public function getOrder($id)
    {
        
        
    }


    public function updateOrder(UpdateOrderRequest $request, $id)
    {
        
    }


    public function destroyOrder($id)
    {
        
        try{
            $this->orderRepo->delete($id);
            return response()->json(["message" => "Deleted Successfuly"], 200);
        }catch(Exception $e){
            return response()->json(["message" => "Something Went Wrong"], 500);
        }
    }
}
