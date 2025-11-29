<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group(['prefix' => 'product'], function(){
    Route::get('show', [ProductController::class, 'showProduct']);
    Route::get('similar-products', [ProductController::class, 'listSimilarProducts']);
});


Route::get('list-product', [ProductController::class, 'listProduct']);
Route::get('list-category', [CategoryController::class, 'listCategory']);
