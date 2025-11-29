<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_image')->insert([
            [
                'product_id'=>1,
                'image_url'=>env('APP_URL') . '/thumbnails/Sổ tay scrapbook A5 dot 130gsm The Reverie Diary - Thỏ Nơ.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'product_id'=>6,
                'image_url'=>env('APP_URL') . '/thumbnails/Vở chấm dot 120 trang Crabit x SGT - The Furry Friends - Xanh tím.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
             [
                'product_id'=>18,
                'image_url'=>env('APP_URL') . '/thumbnails/Set Mini Post Card A Few Notes.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
             [
                'product_id'=>19,
                'image_url'=>env('APP_URL') . '/thumbnails/Box làm đất sét tự khô - Be Happier Clay Craft Box - Box dành cho 1 người (500g).jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
             [
                'product_id'=>5,
                'image_url'=>env('APP_URL') . '/thumbnails/Sổ tay A5 kẻ ngang 130gsm 110 trang A Few Notes - We Should Grab A Matcha.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
             [
                'product_id'=>6,
                'image_url'=>env('APP_URL') . '/thumbnails/Sổ tay bỏ túi Dot The Furry Friends Crabit x SGT - Cu Lỳ.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
             [
                'product_id'=>7,
                'image_url'=>env('APP_URL') . '/thumbnails/Sổ trơn khổ vuông Ribbon Collection Quote Trắng (Tặng kèm nơ).jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
             [
                'product_id'=>8,
                'image_url'=>env('APP_URL') . '/thumbnails/Sổ tay scrapbook A5 grid 130gsm The Reverie Diary - Nhũ Sọc Xanh.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
             [
                'product_id'=>9,
                'image_url'=>env('APP_URL') . '/thumbnails/Sketchbook Khổ Vuông 190gsm The Reverie Diary - Nhũ Nơ Hồng.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
        ]);
    }
}
