<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Services\OrderService;
use App\Models\Address;
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
    public function store(Request $request, OrderService $orderService)
    {
        $params = $request->all();
        try{
            $addresses = $orderService->addAddress($params['address'], $params['phone']);
            return ApiResponse::success($addresses);
        }catch(\Throwable $th){
            return ApiResponse::internalServerError($th);
        }
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
    public function update(Request $request, OrderService $orderService, Address $address)
    {
        $params = $request->all();
        try{
            $addresses = $orderService->updateAddress($address, $params['address'], $params['phone']);
            return ApiResponse::success($addresses);
        }catch(\Throwable $th){
            return ApiResponse::internalServerError($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderService $orderService, Address $address)
    {
        try{
            $orderService->deleteAddress($address);
            return ApiResponse::success();
        }catch(\Throwable $th){
            return ApiResponse::internalServerError($th);
        }
    }
}
