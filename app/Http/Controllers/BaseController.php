<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller{
	
	protected $defaultRes = [
		'code'=>0,
		'data'=>[],
		'msg' =>''
	];

	private function formatResponse($code='', $data=[], $msg=''){

		$data = [
			'code'=>$code,
			'data'=>$data,
			'msg' =>$msg
		];

		return array_merge($this->defaultRes,$data);
	}
	
	protected function formatJson($code='', $data=[], $msg=''){
		
		return response()->json($this->formatResponse($code, $data, $msg));
	}

}