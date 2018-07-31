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

	    //获取分页信息
    protected function getPageInfo(Request $request) {

        if (!empty($request->draw)) {
            $pageInfo = [];
            $pageInfo['draw'] = $request->draw;  // 当前页数
            $pageInfo['start'] = $request->start;//当前第一条记录的开始处
            $pageInfo['length'] = $request->length;//每页多少条数据
            $pageInfo['search'] = $request->search['value'];
            return $pageInfo;
        }
        return [
        	'draw'=>1,
        	'start'=>1,
        	'length'=>10,

        ];
    }
    
}