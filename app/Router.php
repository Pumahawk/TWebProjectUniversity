<?php
	namespace App;
	use Bin\BaseRouter;
	
	class Router extends BaseRouter{
		
		public static $requestList;
		
		public static function boot(){
			Router::get("helloword", 'App\Router::helloword');
			Router::get("testview", 'App\View\Test::test');
			
			Router::get("getInfoProd", "App\Controller\ProductController::getFromId");
			Router::get("/", "App\Controller\ProductController::homePage");
			Router::get("notAdmin", "App\View\User::notAdminPage");
			Router::get("addProductToCart", "App\Controller\ProductController::addToCart");
			Router::get("removeProductfromCart", "App\Controller\ProductController::removeProductfromCart");
			Router::get("openImg", "App\Controller\ProductController::openImg");
			Router::get("registrationPage", "App\View\SitePage::registrationPage");
			Router::get("registrationJSON", "App\Controller\UserController::registrationJSON");
			Router::get("modificaUtenteJSON", "App\Controller\UserController::modificaUtenteJSON") -> middleware("logged");
			//Router::get("contact", "App\View\SitePage::contactPage");
			Router::get("manageProducts", "App\Controller\ProductController::manageProductsPage") -> middleware("isAdmin");
			Router::get("optionProduct", "App\View\SitePage::optionProductPage") -> middleware("isAdmin");
			Router::get("manageOrders", "App\Controller\ProductController::manageOrdersPage") -> middleware("logged");
			Router::get("optionProfile", "App\View\SitePage::optionProfilePage") -> middleware("logged");
			

			Router::get("logOut", "App\Controller\UserController::logOut");
			Router::get("loginForm", "App\Controller\UserController::loginJSON");
			

			Router::get("error", 'App\View\Error::errorRequestConnection');
		}
	}