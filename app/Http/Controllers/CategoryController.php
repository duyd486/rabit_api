<?php

namespace App\Http\Controllers;
use App\Http\Services\ProductService;
use App\Helpers\ApiResponse;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function listCategory(ProductService $service){
        try{
            $categories = $service->getCategories();
            return ApiResponse::success($categories);
        }catch (\Throwable $th){
            return ApiResponse::internalServerError($th);
        }
    }
}
