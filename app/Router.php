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
			Router::get("optionProfile", "App\View\SitePage::optionProfilePage");

			Router::get("error", 'App\View\Error::errorRequestConnection');
		}
	}