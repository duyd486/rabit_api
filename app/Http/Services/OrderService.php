<?php

namespace App\Http\Services;

use App\Models\Address;
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
}