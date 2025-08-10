<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    protected $categoryRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function addCategory(StoreCategoryRequest $request)
    {
        try {
            $category = $this->categoryRepo->store(
                [
                    "name" => $request->name
                ]
            );
            return response()->json($category, 200);
        } catch (Exception $e) {
            return response()->json(["message" => "Error Processing Request!"], 500);

        }
    }

    public function getCategories()
    {
        try {
            $categories = $this->categoryRepo->list();
            return response()->json($categories);
        } catch (Exception $e) {
            return response()->json(["message" => "Error Processing Request!"], 500);
        }
    }

    public function getCategory($id)
    {
        try {
            $category = $this->categoryRepo->getById($id);
            return response()->json($category);
        } catch (Exception $e) {
            return response()->json(["message" => "Error Processing Request!"], 500);
        }
    }

    public function updateCategory(UpdateCategoryRequest $request, $id)
    {
        try {
            $category = $this->categoryRepo->getById($id);
            $category->update($request->only($category->getFillable()));

            return response()->json(
                $category,
                200
            );

        } catch (Exception $e) {
            return response()->json(
                ["message" => "Error Processing Request!"],
                500
            );
        }
    }

    public function destroyCategory($id)
    {
        try {
            $this->categoryRepo->delete($id);
            return response()->json(["message" => "Deleted Successfuly"], 200);
        } catch (Exception $e) {
            return response()->json(
                ["message" => "Error Processing Request!"],
                500
            );
        }

    }
}
