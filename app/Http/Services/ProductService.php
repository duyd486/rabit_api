<?php

namespace App\Http\Services;

use App\Models\Category;
use App\Models\Product;

class ProductService{
    public function getProducts($params){
        $products = Product::select(
            'id',
            'name',
            'price',
            // 'detail',
            // 'quantity',
            // 'total_sold',
            'category_id',
        );

        if(!empty($params['category_id'])){
            $category_id = $params['category_id'];
            $products->where('category_id', $category_id);
        }

        if (!empty($params['search_key'])) {
            $searchKey = $params['search_key'];
            $products->where('name', 'like', "%{$searchKey}%");
        }

        switch ($params['sort_type'] ?? 'default') {
            case 'newest':
                $products->orderBy('created_at', 'desc');
                break;
            case 'best_seller':
                $products->orderBy('total_sold', 'desc');
                break;
            case 'price_asc':
                $products->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $products->orderBy('price', 'desc');
                break;
            default:
                $products->orderBy('id', 'asc');
                break;
        }

        // $products = $products->with('images:product_id,image_url')->with('category:id,name,thumbnail_url')->offset($params['offset'] ?? 0)->limit(16)->get();
        $products = $products->with('images:product_id,image_url')->offset($params['offset'] ?? 0)->limit($params['limit'] ?? 16)->get();

        return $products;
    }

    public function getCategories(){
        $categories = Category::select('id','name','parent_id','thumbnail_url')->where('parent_id', '=', 0)->with('childrens:id,parent_id,name,thumbnail_url')->get();
        return $categories;
    }

    public function getSimilarProducts($product, $limit){
        $products = Product::select('id', 'name', 'price', 'category_id')
                            ->where('category_id', $product->category_id)
                            ->where('id', '<>', $product->id)
                            ->with('images:product_id,image_url')
                            ->orderByDesc('total_sold')
                            ->limit($limit)
                            ->get();
        return $products;
    }

    public function getProduct($product){
        $product = $product->select('id', 'name', 'price', 'detail', 'quantity', 'total_sold', 'category_id')
                            ->where('id', $product->id)
                            ->with('images:product_id,image_url')
                            ->with('category:id,name,thumbnail_url')
                            ->first();
        return $product;
    }
}
