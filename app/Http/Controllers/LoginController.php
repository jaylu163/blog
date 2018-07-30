<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use JWTAuth;
use Google;
use App\Services\LoginService;

class LoginController extends BaseController
{
    
    public function index(){

        //$this->formatJson();
        // 创建谷歌验证码
        $createSecret = Google::CreateSecret();
        return view('login.login',['createSecret' => $createSecret]);
    }

    public function register(Request $request)
    {        
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $result = User::create($input);
        return response()->json(['result'=>true]);
    }
    
    public function login(Request $request)
    {
        $params = $request->all();
        //$google = $params['google'];
        //$code   = $params['code'];
        //$result = LoginService::checkCode($google,$code);

        //if($result === false){
        //   return $this->formatJson(1,[],'google 动态验证码不对');
        //}
        $input = array_except($params,['code','google']);
        if (!$token = JWTAuth::attempt($input)) {
            return $this->formatJson('',[],'wrong email or password.');
        }

       return $this->formatJson(0,['token' => $token],'');
    }
    
}