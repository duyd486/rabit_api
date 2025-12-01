<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\Bill;
use App\Models\OrderItem;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    public function createBill (Request $request) {
        $params = $request->all();
        // DB::table('bill')->insert([
        //     'address_id'=>$params['address_id'],
        //     'total_price'=>$params['total_price'],
        //     'status'=>1,
        //     'user_id'=>Auth::id(),
        // ]);

        $bill = Bill::create([
            'address_id'=>$params['address_id'],
            'total_price'=>$params['total_price'],
            'status'=>1,
            'user_id'=>Auth::id(),
        ]);
        OrderItem::insert([
            'product_id'=>$params['product_id'],
            'quantity'=>$params['quantity'],
            'total_price'=>$params['total_price'],
            'bill_id'=>$bill->id
        ]);
        return ApiResponse::success();
    }

}
