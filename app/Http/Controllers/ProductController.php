<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Services\ProductService;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\BinaryOp\Equal;

class ProductController extends Controller
{
    public function listProduct(Request $request, ProductService $productService){
        $params = $request->all();
        try{
            $products = $productService->getProducts($params);
            return ApiResponse::success($products);
        }catch (\Throwable $th){
            return ApiResponse::internalServerError($th);
        }
    }

    public function listSimilarProducts(Request $request, ProductService $productService, Product $product) {
        $params = $request->all();
        try{
            $products = $productService->getSimilarProducts($product, $params['limit']);
            return ApiResponse::success($products);
        }catch (\Throwable $th){
            return ApiResponse::internalServerError($th);
        }
    }

    public function showProduct(Request $request, ProductService $productService, Product $product){
        $params = $request->all();
        try{
            $product = $productService->getProduct($product);
            return ApiResponse::success($product);
        }catch (\Throwable $th){
            return ApiResponse::internalServerError($th);
        }
    }
}
