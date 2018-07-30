<?php

namespace App\Services;
use Google;

class GoogleCodeService {
	


	public static function checkCode($google,$code){

		return  Google::CheckCode($google,$code);
	}
}