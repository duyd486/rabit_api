<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Services\OrderService;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(OrderService $orderService)
    {
        try{
            $addresses = $orderService->listAddress();
            return ApiResponse::success($addresses);
        }catch(\Throwable $th){
            return ApiResponse::internalServerError($th);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
