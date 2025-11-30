<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
                'email'=>'duy@gmail.com',
                'password'=>Hash::make('11111111'),
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'trang',
                'setting_id'=>'2',
                'email'=>'trang@gmail.com',
                'password'=>Hash::make('11111111'),
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'hieu',
                'setting_id'=>'1',
                'email'=>'hieu@gmail.com',
                'password'=>Hash::make('11111111'),
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'ngoc',
                'setting_id'=>'1',
                'email'=>'ngoc@gmail.com',
                'password'=>Hash::make('11111111'),
                'created_at'=>now(),
                'updated_at'=>now()
            ],
        ]);
    }
}
