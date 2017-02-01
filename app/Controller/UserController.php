<?php
	namespace App\Controller;
	
	class UserController{
		public static function logOut(){
			\App\Router::process("/");
		}
	}