<?php
	namespace App;
	use Bin\BaseRouter;
	
	class Router extends BaseRouter{
		
		public static $requestList;
		
		public static function boot(){
			Router::get("helloword", 'App\Router::helloword');
			Router::get("testview", 'App\View\Test::test');
			
			Router::get("/", "App\View\SitePage::homePage");
			Router::get("contact", "App\View\SitePage::contactPage");
			Router::get("manageProducts", "App\View\SitePage::manageProductsPage");
			Router::get("manageOrders", "App\View\SitePage::manageOrdersPage");
			Router::get("optionProfile", "App\View\SitePage::optionProfilePage");

			Router::get("logOut", "App\Controller\UserController::logOut");
			Router::get("logIn", "App\Controller\UserController::logIn");
			

			Router::get("error", 'App\View\Error::errorRequestConnection');
		}
	}