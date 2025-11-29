<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function listProduct(Request $request){
        $params = $request->all();

        try{

            

            $products = Product::with('images')->select(['name', 'id'])->get();
            return ApiResponse::success($products);
        }catch (\Throwable $th){
            return ApiResponse::internalServerError($th);
        }

    }
}
