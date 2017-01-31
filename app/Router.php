<?php
	namespace App;
	use Bin\BaseRouter;
	
	class Router extends BaseRouter{
		
		public static $requestList;
		
		public static function boot(){
			Router::get("helloword", 'App\Router::helloword');
			Router::get("test", 'App\Router::test') -> middleware("logged");
			
			Router::get("/", "App\View\Home::index");
			Router::get("orders","App\View\Ordini::index");
			Router::get("orderManagement","App\View\OrderManagement::index");
			
			Router::get("productsInCart","App\Controller\ProductController::productsInCart");
			Router::get("productsList","App\Controller\ProductController::productsList") -> params($_GET);
			Router::get("addProduct","App\Controller\ProductController::addProduct") -> params($_POST);
			
			Router::get("login","App\Controller\UserController::login") -> params($_POST);
			Router::get("logout","App\Controller\UserController::logout");
			

			Router::get("error", 'App\View\Error::errorRequestConnection');
		}
	}