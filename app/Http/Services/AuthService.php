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

        $user->load('setting:user_id,language,color');

        return $user;
    }

    public function signUp($data)
    {
        $user = User::create([
            'name' => explode('@', $data['email'])[0],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'birth' => null,
            'avatar_url' => env('APP_URL') . '/avatars/defaultAvt.jpg',
        ]);

        $token = $user->createToken($user->email)->plainTextToken;

        $user->token = $token;

        $user->setting()->create([
            'language' => 'VI',
            'color' => '#FFFFFF',
        ]);

        $user->load('setting:user_id,language,color');

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
