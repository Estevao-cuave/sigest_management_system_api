<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupplyRequest;
use App\Http\Requests\UpdateSupplyRequest;
use App\Models\Supply;
use App\Repositories\Interfaces\SupplyRepositoryInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use JsonException;
use Mockery\Expectation;
use Throwable;

class SupplyController extends Controller
{

    protected $supplyRepo;

    public function __construct(SupplyRepositoryInterface $supplyRepo)
    {
        $this->supplyRepo = $supplyRepo;
    }


    public function addSupply(StoreSupplyRequest $request)
    {
        try {
            $supplies = $this->supplyRepo->store(
                [
                    "name" => $request->name,
                    "description" => $request->description,
                    "stock" => $request->stock,
                    "unit" => $request->unit,
                    "expires_at" => $request->expires_at,
                    "entry_date" => $request->entry_date,
                    "last_date" => $request->last_date,
                    "category_id" => $request->category_id,
                    "supplier_id" => $request->supplier_id,
                ]
            );

        } catch (JsonException $e) {
            return new JsonResponse(data: ["massage" => "Error Processing Request!"]);
        }
        return response()->json(["massage" => "Supply created Succefully!"], 200);
    }



    public function getAllSupplies()
    {

        try {
            return response()->json($this->supplyRepo->list(), 200);
        } catch (JsonException $e) {
            return response()->json(data: ["massage" => 'Something Went Wrong: $e']);
        }

    }

    public function getSupply($id)
    {

        try {
            return response()->json($this->supplyRepo->getById($id), 200);
        } catch (JsonException $e) {
            return response()->json(data: ["massage" => 'Something Went Wrong: $e']);
        }

    }
   

    public function update(UpdateSupplyRequest $request, $id)
    {

        try {

            $supply = $this->supplyRepo->getById($id);
            $supply->update($request->only($supply->getFillable()));
            return response()->json($supply, 200);

        } catch (JsonException $e) {

            return response()->json(data: ["massage" => 'Something Went Wrong: $e']);

        }
    }

    public function destroy($id)
    {
        try {
            $this->supplyRepo->delete($id);
            return response()->json(["massage" => "Supply deleted Succefully!"], 200);
        } catch (JsonException $e) {
            return response()->json(["massage" => 'Something Went Wrong: $e']);

        }
    }
}
