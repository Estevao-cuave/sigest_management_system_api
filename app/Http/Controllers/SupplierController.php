<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Repositories\Interfaces\SupplierRepositoryInterface;
use Illuminate\Http\JsonResponse;
use JsonException;

class SupplierController extends Controller
{

    protected $supplierRepo;

    public function __construct(SupplierRepositoryInterface $supplierRepo){
        $this->supplierRepo = $supplierRepo;
    }
 
    
    public function create(Request $request)
    {

        try{
            $supplier = $this->supplierRepo->store(
                data: [
                    "name" => $request->name,
                    "email" => $request->email,
                    "phone" => $request->phone,
                    "address" => $request->address,
                    "city" => $request->city,
                    "country" => $request->country,
                    "agent" => $request->agent,
                    "agent_phone" => $request->agent_phone,
                    "is_active" => $request->is_active,
                ]
            );

        }catch (JsonException $e){
            return new JsonResponse(data: ["message" => "Something Went Wrong"]);
        }
        return response()->json(["message" => "Supplier created successfully"], 200);
    }


    public function getAllSupplier()
    {

        try{
            return response()->json( $this->supplierRepo->list(), 200);
        }catch(JsonException $e){
            return response()->json(data: ["massage" => 'Something Went Wrong: $e']);
        }
    }


    public function getSupplier($id)
    {

        try{
            return response()->json($this->supplierRepo->getById($id), 200);
        }catch(JsonException $e){
            return response()->json(data: ["message" => 'Something Went Wrong: $e' ]);
        }
    }



    public function update(Request $request, $id)
    {
        try{
            $supplier = $this->supplierRepo->getById($id);
            $supplier->update($request->only($supplier->getFillable()));
            return response()->json($supplier, 200);
        }catch(JsonException $e){
            return response()->json(data: ["message" => 'Something Went Wrong: $e']);
        }
    }


    public function destroy($id)
    {
        try{
            $this->supplierRepo->delete($id);
            return response()->json(["message" => 'Supplier deleted Succefully'], 200);
        }catch(JsonException $e){
            return response()->json(data: ["message" => 'Something Went Wrong: $e']);
        }
    }
}
