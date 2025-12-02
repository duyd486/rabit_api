<?php

namespace App\Http\Services;

use App\Models\Address;
use App\Models\Bill;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderService{
    public function listAddress(){
        $addresses = Address::select('addresses', 'phone')->where('user_id', Auth::user()->id)->get();
        return $addresses;
    }

    public function addAddress($address, $phone){
        try{
            $item = Address::create([
                'user_id' => Auth::user()->id,
                'addresses' => $address,
                'phone' => $phone,
            ]);
            return true;
        }catch(\Throwable $th){
            return false;
        }
    }

    public function updateAddress(Address $addressObj, $address, $phone){
        try{
            $addressObj->update([
                'addresses' => $address,
                'phone' => $phone,
            ]);
            return true;
        }catch(\Throwable $th){
            return false;
        }
    }

    public function deleteAddress(Address $address){
        try{
            $address->delete();
            return true;
        }catch(\Throwable $th){
            return false;
        }
    }


    public function createBill($addressId, $items){
        try{
            $totalBillPrice = 0;
            foreach($items as $item){
                $totalPrice = Product::find($item['id'])->price * $item['quantity'];
                OrderItem::insert([
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'total_price' => $totalPrice,
                ]);
                $totalBillPrice += $totalPrice;
            }
            $bill = Bill::create([
                'address_id' => $addressId,
                'total_price' => $totalBillPrice,
                'status' => 1,
                'user_id' => Auth::id(),
            ]);
            return true;
        }catch(\Throwable $th){
            return false;
        }
    }
}
