<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name'=>'Sổ tay',
                'parent_id'=>0,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Vở viết',
                'parent_id'=>0,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Phụ kiện',
                'parent_id'=>0,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Art and Craft',
                'parent_id'=>0,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
        ]);

        DB::table('categories')->insert([
            [
                'name'=>'Sổ kẻ ngang',
                'parent_id'=>1,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Sổ chấm',
                'parent_id'=>1,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Sổ trơn',
                'parent_id'=>1,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Sổ ô vuông',
                'parent_id'=>1,
                'created_at'=>now(),
                'updated_at'=>now()
            ]
        ]);
    }
}
