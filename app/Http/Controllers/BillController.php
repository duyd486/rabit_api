<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Services\OrderService;
use App\Models\Bill;
use App\Models\OrderItem;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    public function createBill (Request $request, OrderService $orderService) {
        $params = $request->all();
        try{
            $res = $orderService->createBill($params['address_id'], $params['items'], $params['payment_method']);
            if($res != null){
                return ApiResponse::success($res);
            } else{
                return ApiResponse::internalServerError();
            }
        }catch(\Throwable $th){
            return ApiResponse::internalServerError($th);
        }
    }

}
