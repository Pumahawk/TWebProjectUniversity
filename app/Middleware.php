<?php
	namespace App;
	
	use Bin\BaseMiddleware;
	
	class Middleware extends BaseMiddleware{
		public static function logged($request){
			if(!isset($_SESSION["utente"]) || $_SESSION["utente"] == null)
				Router::process("notLogged");
			else{
				Middleware::process($request);
			}
		}
		public static function isAdmin($request){
			if(!isset($_SESSION["utente"]) || $_SESSION["utente"] == null || $_SESSION["utente"]["tipo"] != "admin")
				Router::process("notAdmin");
			else
				Middleware::process($request);
		}
	}