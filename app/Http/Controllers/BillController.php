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
            // $items = [
            //     [
            //         "id"=>1,
            //         "quantity"=>3
            //     ],
            //     [
            //         "id"=>2,
            //         "quantity"=>4
            //     ]
            // ];
            // $res = $orderService->createBill('HN', $items, "online");
            $res = $orderService->createBill($params['address'], $params['items'], $params['method']);
            if($res != null){
                return ApiResponse::success($res);
            } else{
                return ApiResponse::internalServerError("Tra ve null");
            }
        }catch(\Throwable $th){
            return ApiResponse::internalServerError($th);
        }
    }

}
