<?php

namespace App\Http\Services;

use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService{
    public function login($data){

        if (!Auth::attempt($data)) {
            return null;
        }

        $user = Auth::user();
        
        $token = $user->createToken($user->email)->plainTextToken;

        $user->token = $token;

        return $user;
    }

    public function signUp($data)
    {
        $setting = Setting::create([
            'language' => 'VI',
            'color' => '#FFFFFF',
        ]);
        $user = User::create([
            'name' => explode('@', $data['email'])[0],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'setting_id' => $setting->id,
        ]);

        $token = $user->createToken($user->email)->plainTextToken;

        $user->token = $token;

        return $user;
    }

    public function logout($user){
        try {

            $user->tokens()->delete();

            return true;

        } catch (\Throwable $th) {
            return false;
        }
    }
}