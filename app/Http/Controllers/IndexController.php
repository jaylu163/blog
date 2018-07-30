<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends BaseController{
	

	public function getInfo(Request $request){
		$defaultInfo =  array(
			'name'=>'chart js 曲线图',
        );

		return view('index.index', ['info' => $defaultInfo]);
	}
}