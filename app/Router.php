<?php
	namespace App;
	use Bin\BaseRouter;
	
	class Router extends BaseRouter{
		
		public static $requestList;
		
		public static function boot(){
			Router::get("helloword", 'App\Router::helloword');
			Router::get("testview", 'App\View\Test::test');

			Router::get("/", "App\View\Home::index");
			Router::get("manageProducts", "App\View\Products::index");
			Router::get("userOptionPage", "App\View\User::index");
			Router::get("manageOrders", "App\View\Order::index");

			Router::get("error", 'App\View\Error::errorRequestConnection');
		}
	}