<?php
	namespace App;
	
	class Middleware{
		public static function process($request){
			call_user_func($request -> action, $request -> params);
		}
		public static function logged($request){
			Middleware::process($request);
		}
	}