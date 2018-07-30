<?php

namespace App\Services;

use App\Models\user;

class UsersService {
	

	public static function getUserInfo($user,$password){
		$user = User::getUser($user,$password);
		if($user){
			return ['user'=>$user->toArray(),'msg_num'=>22,'unread'=>'34'];
		}
		return false;
	}
}