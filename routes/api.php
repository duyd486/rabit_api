<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post('login', [AuthController::class, 'login']);
Route::post('signup', [AuthController::class, 'signUp']);

Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('logout', [AuthController::class, 'logout']);

    Route::group(['prefix' => 'cart'], function(){
        Route::get('list-product', [CartController::class, 'listProduct']);
        Route::get('update-product', [CartController::class, 'updateProduct']);
        Route::get('clear-cart', [CartController::class, 'clearCart']);
    });

    Route::group(['prefix' => 'address'], function(){
        Route::get('list-address', [AddressController::class, 'index']);
        Route::get('add-address', [AddressController::class, 'store']);
        Route::get('update-address/{address}', [AddressController::class, 'update']);
        Route::get('delete-address/{address}', [AddressController::class, 'destroy']);
    });

    Route::get('create-bill', [BillController::class, 'createBill']);
});

Route::group(['prefix' => 'product'], function(){
    Route::get('show/{product}', [ProductController::class, 'showProduct']);
    Route::get('similar-products/{product}', [ProductController::class, 'listSimilarProducts']);
});


Route::get('list-product', [ProductController::class, 'listProduct']);
Route::get('list-category', [CategoryController::class, 'listCategory']);
