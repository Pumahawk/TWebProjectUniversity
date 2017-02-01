<?php
	namespace App;
	
	use Bin\BaseMiddleware;
	
	class Middleware extends BaseMiddleware{
		public static function logged($request){
			Middleware::process($request);
		}
	}