<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name'=>'duy',
                'setting_id'=>'1',
                'email'=>'duyd486@gmail.com',
                'password'=>'11111111',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'trang',
                'setting_id'=>'2',
                'email'=>'vantrang123@gmail.com',
                'password'=>'123456789',
                'created_at'=>now(),
                'updated_at'=>now()
            ]
        ]);
    }
}
