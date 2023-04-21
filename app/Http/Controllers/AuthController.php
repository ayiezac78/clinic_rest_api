<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //login
    public function login(Request $request){
        try {
            if(Auth::attempt($request->only('email','password'))){
                $user = Auth::user();
                $tokenResult = $user->createToken('app')->accessToken;
                return response([
                    'message' => 'Login success',
                    'token' => $tokenResult,
                    'user' => $user
                ], 200);
            }
        } 
        catch (Exception $exception) {
            return response([
                'message' => $exception->getMessage()
            ],400);
        }
        //expected errors
        return response([
                'message' => 'Invalid email or password'
            ],401);
    }

    //register
    public function register(RegisterRequest $request){
        try {
            //eloquent
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
                ]);
                $token = $user->createToken('app')->accessToken;
                return response([
                    'message' => 'Register success',
                    'token' => $token,
                    'user' => $user
                ],201);
        }
        catch (Exception $exception) {
            return response([
                'message' => $exception->getMessage()
            ],400);
        }
    }
}
