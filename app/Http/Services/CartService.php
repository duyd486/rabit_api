<?php

namespace App\Http\Services;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CartService{
    public function getProducts($limit){
        $user = Auth::user();

        $cartItems = $user->carts()->with(['product:id,name,price,category_id', 'product.images:product_id,image_url'])->limit($limit ?? 6)->get();

        $products = $cartItems->map(fn($item) => [
            'product' => $item->product,
            'quantity' => $item->quantity
        ]);

        return $products;
    }

    public function updateProduct($params){
        $message = '';
        switch ($params['update_type'] ?? 'default') {
            case 'add':
                $this->add($params['product_id']);
                $message = 'Thêm thành công';
                break;
            case 'minus':
                $this->minus($params['product_id']);
                $message = 'Giảm thành công';
                break;
            case 'change':
                $this->changeQuantity($params['product_id'], $params['quantity']);
                break;
            case 'delete':
                $this->delete($params['product_id']);
                $message = 'Xóa thành công';
                break;
            default:
                break;
        }
        return $message;
    }

    public function clearProducts() {
        Cart::where('user_id', Auth::user()->id)->delete();
    }


    private function changeQuantity($id, $quantity){
        $item = Cart::where('user_id', Auth::user()->id)->where('product_id', $id)->first();
        $item->update([
            'quantity' => $quantity
        ]);
    }

    private function add($id){
        $item = Cart::where('user_id', Auth::user()->id)->where('product_id', $id)->first();
        if ($item) {
            $item->update([
                'quantity' => $item->quantity + 1
            ]);
        } else {
            $item = Cart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $id,
                'quantity' => 1
            ]);
        }
    }

    private function minus($id){
        $item = Cart::where('user_id', Auth::user()->id)->where('product_id', $id)->first();
        if($item->quantity == 1){
            $this->delete($id);
        }else{
            $item->update([
                'quantity' => $item->quantity - 1
            ]);
        }
    }

    private function delete($id){
        $item = Cart::where('user_id', Auth::user()->id)->where('product_id', $id)->first();
        $item->delete();
    }

}
