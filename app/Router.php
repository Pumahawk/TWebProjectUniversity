<?php
	namespace App;
	use Bin\BaseRouter;
	
	class Router extends BaseRouter{
		
		public static $requestList;
		
		public static function boot(){
			Router::get("helloword", 'App\Router::helloword');
			Router::get("testview", 'App\View\Test::test');

			Router::get("/", "App\View\SitePage::homePage");
			Router::get("notAdmin", "App\View\User::notAdminPage");
			Router::get("registrationPage", "App\View\SitePage::registrationPage");
			Router::get("registrationJSON", "App\Controller\UserController::registrationJSON");
			Router::get("modificaUtenteJSON", "App\Controller\UserController::modificaUtenteJSON");
			//Router::get("contact", "App\View\SitePage::contactPage");
			Router::get("manageProducts", "App\View\SitePage::manageProductsPage") -> middleware("isAdmin");
			Router::get("optionProduct", "App\View\SitePage::optionProductPage") -> middleware("isAdmin");
			Router::get("manageOrders", "App\View\SitePage::manageOrdersPage") -> middleware("logged");
			Router::get("optionProfile", "App\View\SitePage::optionProfilePage") -> middleware("logged");
			

			Router::get("logOut", "App\Controller\UserController::logOut");
			Router::get("loginForm", "App\Controller\UserController::loginJSON");
			

			Router::get("error", 'App\View\Error::errorRequestConnection');
		}
	}