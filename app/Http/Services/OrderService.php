<?php

namespace App\Http\Services;

use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class OrderService{
    public function listAddress(){
        $addresses = Address::select('addresses', 'phone')->where('user_id', Auth::user()->id)->get();
        return $addresses;
    }
}