<?php
	namespace App;
	
	class Router{
		
		public static $requestList;
		
		public static function boot(){
			Router::get("helloword", 'App\Router::helloword', null);
			
			Router::get("/", "App\View\Home::index",null);
			Router::get("orders","App\View\Ordini::index",null);
			Router::get("orderManagement","App\View\OrderManagement::index",null);
			
			Router::get("productsInCart","App\Controller\ProductController::productsInCart",null);
			Router::get("productsList","App\Controller\ProductController::productsList",$_GET);
			Router::get("addProduct","App\Controller\ProductController::addProduct",$_POST);
			
			Router::get("login","App\Controller\UserController::login",$_POST);
			Router::get("logout","App\Controller\UserController::logout",null);
		}
		
		public static function get($command, $algorithm, $params){
			Router::$requestList[$command]["a"] = $algorithm;
			Router::$requestList[$command]["p"] = $params;
		}
		
		public static function process($request){
			if(isset(Router::$requestList[$request]))
				call_user_func(Router::$requestList[$request]["a"], Router::$requestList[$request]["p"]);
		}
		
		public static function helloword(){
			echo "Hello Word!";
		}
	}