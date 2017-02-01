<?php
	namespace App;
	use Bin\BaseRouter;
	
	class Router extends BaseRouter{
		
		public static $requestList;
		
		public static function boot(){
			Router::get("helloword", 'App\Router::helloword');
			Router::get("testview", 'App\View\Test::test');

			Router::get("error", 'App\View\Error::errorRequestConnection');
		}
	}