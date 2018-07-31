<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use JWTAuth;

class UsersController extends BaseController{


    public function getUserDetails(Request $request)
    {
    	
    	$user = $request->user->toArray();
        return $this->formatJson('', $user, $msg='');
    }

    public function add(Request $request){
    	return view('users.add',[]);
    }

 	public function index(){

 		return view('users.index',['user'=>'']);

 	} 

 	public function ajaxGetData(Request $request){

		$pageInfo = $this->getPageInfo($request);
 		$user = User::where('status',1)->skip($pageInfo['start'])->take($pageInfo['length'])->get()->all();
 		$userCount = User::where('status',1)->count();
 		$data = [
 			    'draw' => $pageInfo['draw'],
                'recordsTotal' => $userCount,
                'recordsFiltered' => $userCount,
                'data' => $user,
                //'search'=>''
 		];
 		return response()->json($data);
 	}  
}