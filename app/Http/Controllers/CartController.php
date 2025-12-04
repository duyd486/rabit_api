<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function listProduct(Request $request, CartService $cartService){
        $params = $request->all();
        try{
            $products = $cartService->getProducts($params['limit']);
            return ApiResponse::success($products);
        }catch (\Throwable $th){
            return ApiResponse::internalServerError($th);
        }
    }

    public function updateProduct(Request $request, CartService $cartService){
        try{
            $validated = $request->validate([
                'product_id' => ['required'],
                'update_type' => ['required'],
            ]);
            $message = $cartService->updateProduct($validated);
            return ApiResponse::success($message);
        }catch (\Throwable $th){
            return ApiResponse::internalServerError($th);
        }
    }

    public function clearCart(Request $request, CartService $cartService){
        try{
            $cartService->clearProducts();
            return ApiResponse::success();
        }catch (\Throwable $th){
            return ApiResponse::internalServerError($th);
        }
    }
}
