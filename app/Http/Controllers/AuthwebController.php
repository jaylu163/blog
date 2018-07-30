<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Hash;
use App\Services\GoogleCodeService;
use App\Services\UsersService;
use Google;

class AuthwebController extends BaseController
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
        $input['password'] = md5($input['password']);
        $result = User::create($input);
        return response()->json(['result'=>true]);
    }
    
    public function login(Request $request)
    {
        $params = $request->all();
        $google = $params['google'];
        //$code   = $params['code'];
       /* $result = GoogleCodeService::checkCode($google,$code);

        if($result === false){
           return $this->formatJson(1,[],'google 动态验证码不对');
        }*/
        $input = array_except($params,['code','google']);
        if (!$user = UsersService::getUserInfo($input['username'], $input['password'])) {
            return redirect('/login');
        }
        $request->session()->put('user_info', $user);
        return  redirect('/index/main');
    }
    
    public function logout(Request $request){

        //销毁session
        //销毁token
        $request->session()->forget('user_info');
        return redirect('/login');
    }
}