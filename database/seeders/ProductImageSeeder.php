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
            ]
        ]);
    }
}
