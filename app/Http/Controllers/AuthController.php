<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request, AuthService $authService){
        try {
            $validated = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            $user = $authService->login($validated);

            if (!$user) {
                return ApiResponse::dataNotfound();
            }

            return ApiResponse::success($user);
        } catch (\Throwable $th) {
            return ApiResponse::internalServerError($th->getMessage());
        }
    }
    public function signUp(Request $request, AuthService $authService){
        try {
            $validated = $request->validate([
                'email'    => ['required', 'email', 'unique:users,email'],
                'password' => ['required'],
            ]);

            $user = $authService->signUp($validated);

            return ApiResponse::success($user);
        } catch (\Throwable $th) {
            return ApiResponse::internalServerError($th->getMessage());
        }
    }

    public function logout(Request $request, AuthService $authService){
        $user = $request->user();

        if($authService->logout($user)){
            return ApiResponse::success();
        }
        
        return ApiResponse::internalServerError();
    }
}
