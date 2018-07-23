<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use JWTAuth;

class LoginController extends BaseController
{
    
    public function register(Request $request)
    {        
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $result = User::create($input);
        return response()->json(['result'=>true]);
    }
    
    public function login(Request $request)
    {
        $input = $request->all();
        if (!$token = JWTAuth::attempt($input)) {
            return response()->json(['msg' => 'wrong email or password.']);
        }
            return response()->json(['token' => $token]);
    }
    
}