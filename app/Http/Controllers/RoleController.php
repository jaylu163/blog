<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class RoleController extends BaseController{

	public function add(){

		return view('role.add',['aa'=>'App']);
	}

}