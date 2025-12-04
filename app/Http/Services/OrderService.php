<?php

namespace App\Http\Services;

use App\Models\Address;
use App\Models\Bill;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use PayOS\PayOS;

class OrderService{

    private $payOS;

    public function __construct()
    {
        $this->payOS = new PayOS(
            clientId: getenv('PAYOS_CLIENT_ID'),
            apiKey: getenv('PAYOS_API_KEY'),
            checksumKey: getenv('PAYOS_CHECKSUM_KEY')
        );
    }

    public function listAddress($limit){
        $addresses = Address::select('addresses', 'phone')->where('user_id', Auth::user()->id)->limit($limit ?? 6)->get();
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


    public function createBill($address, $items, $method){
        try{
            $totalBillPrice = 0;

            $products = [];
            
            $bill = Bill::create([
                'address' => $address,
                'total_price' => $totalBillPrice,
                'order_code' => intval(substr(strval(microtime(true) * 10000), -6)),
                'user_id' => Auth::id(),
            ]);

            foreach($items as $item){
                $product = Product::find($item['id']);

                $totalPrice = $product->price * $item['quantity'];

                OrderItem::insert([
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'total_price' => $totalPrice,
                    'bill_id' => $bill->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                array_push($products, [
                    'name' => $product->name,
                    'quantity' => $item['quantity'],
                    'price' => $totalPrice,
                ]);

                $totalBillPrice += $totalPrice;
            }

            $bill->total_price = $totalBillPrice;

            if($method === 'online'){
                $bill->status = 1;
                $bill->save();
                return $this->createPaymentLink($bill, $products);
            } else {
                $bill->status = 4;
                $bill->save();
            }

            return $bill;
        }catch(\Throwable $th){
            return null;
        }
    }

    public function createPaymentLink($bill, $items){
        try{
            $res = null;
    
            $data = [
                'orderCode' => $bill->order_code,
                'amount' => $bill->total_price,
                'description' => "Thanh toán hóa đơn {$bill->order_code}",
                'items' => $items,
                'returnUrl' => 'http://google.com',
                'cancelUrl' => 'http://chatgpt.com',
                'expiredAt' => now()->addMinutes(10)->timestamp,
            ];
    
            $res = $this->payOS->createPaymentLink($data);
    
            return $res;
        }catch(\Throwable $th){
            return $th->getMessage();
        }
    }

}
