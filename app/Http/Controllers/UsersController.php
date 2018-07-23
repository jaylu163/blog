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

}