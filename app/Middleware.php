<?php
	namespace App;
	
	use Bin\BaseMiddleware;
	
	class Middleware extends BaseMiddleware{
		public static function logged($request){
			if(!isset($_SESSION["user"]) || $_SESSION["user"] == null)
				Router::process("notLogged");
			else
				Middleware::process($request);
		}
		public static function isAdmin($request){
			if(!isset($_SESSION["user"]) || $_SESSION["user"] == null || $_SESSION["tipo"] != "admin")
				Router::process("notAdmin");
			else
				Middleware::process($request);
		}
	}