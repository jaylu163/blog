<?php
namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Google;

class GoogleqcodeController extends BaseController{
	
	public function index(){

		// 创建谷歌验证码
		$createSecret = Google::CreateSecret();
		// 您自定义的参数，随表单返回
		$parameter = [];
		return view('login.google.google', ['createSecret' => $createSecret,"parameter" => $parameter]);
	}

	public function checCode(Request $request){

		if ($request->isMethod('post')) {
		    if (empty($request->onecode) && strlen($request->onecode) != 6) {
		    	return back()->with('msg','请正确输入手机上google验证码 ！')->withInput();
		    }
		    // google密钥，绑定的时候为生成的密钥；如果是绑定后登录，从数据库取以前绑定的密钥
		    $google = $request->google;
		   
		    // 验证验证码和密钥是否相同
		    if(Google::CheckCode($google,$request->onecode)) {
		        // 绑定场景：绑定成功，向数据库插入google参数，跳转到登录界面让用户登录
		        // 登录认证场景：认证成功，执行认证操作
		        dd("认证成功");
		    }else{
		        // 绑定场景：认证失败，返回重新绑定，刷新新的二维码
		        return back()->with('msg','请正确输入手机上google验证码 ！')->withInput();
		        // 登录认证场景：认证失败，返回重新绑定，刷新新的二维码
		        return back()->with('msg','验证码错误，请输入正确的验证码 ！')->withInput();
		    }
		}else{

		    // 创建谷歌验证码
		    $createSecret = Google::CreateSecret();
		    // 您自定义的参数，随表单返回
		    $parameter = [];
		    return view('login.google.google', ['createSecret' => $createSecret,"parameter" => $parameter]);
		}
	}
}