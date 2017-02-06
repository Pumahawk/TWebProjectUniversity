<?php
	namespace App;
	use Bin\BaseRouter;
	
	/**
	 * Classe che gestisce le richieste del client reindirizzando le richieste 
	 * al metodo opportuno.
	 * Le richieste vengono fatte al server attraverso la QueryURL nel formato 
	 * ?request={valore}
	 * Specificare nel merodo boot le richieste che si vogliono gestire per 
	 * mezzo del metodo get della classe BaseRouter.
	 * 
	 * ES:
	 * 
	 * QueryURL = "?request=addUser"
	 * 
	 * Router::get("addUser", "\Nome\Funzione\del\controller\da\invocare
	 * 
	 * @author Lorenzo Gandino
	 *
	 */
	
	class Router extends BaseRouter{
		
		/**
		 * Metodo primo metodo evocato all'avvio dell'applicazione.
		 * Permette di settare i reindirizzamenti verso i controller.
		 */
		public static function boot(){

			//---------------------INIZIO RICHIESTE PRODUCTCONTROLLER
			Router::get("getProdOrder", "App\Controller\ProductController::getProdOrder");
			Router::get("setCons", "App\Controller\ProductController::setCons") -> middleware("isAdmin");
			Router::get("getInfoProd", "App\Controller\ProductController::getFromId");
			Router::get("buy", "App\Controller\ProductController::buy");
			Router::get("/", "App\Controller\ProductController::homePage");
			Router::get("addProductToCart", "App\Controller\ProductController::addToCart");
			Router::get("removeProductfromCart", "App\Controller\ProductController::removeProductfromCart");
			Router::get("manageProducts", "App\Controller\ProductController::manageProductsPage") -> middleware("isAdmin");
			Router::get("openImg", "App\Controller\ProductController::openImg");
			Router::get("manageOrders", "App\Controller\ProductController::manageOrdersPage") -> middleware("logged");
			//---------------------FINE RICHIESTE PRODUCTCONTROLLER

			//---------------------INIZIO RICHIESTE USERCONTROLLER
			Router::get("loginForm", "App\Controller\UserController::loginJSON");
			Router::get("logOut", "App\Controller\UserController::logOut");
			Router::get("registrationJSON", "App\Controller\UserController::registrationJSON");
			Router::get("modificaUtenteJSON", "App\Controller\UserController::modificaUtenteJSON") -> middleware("logged");
			//---------------------FINE RICHIESTE USERCONTROLLER

			//---------------------INIZIO RICHIESTE VIEW SITEPAGE
			Router::get("registrationPage", "App\View\SitePage::registrationPage");
			Router::get("optionProduct", "App\View\SitePage::optionProductPage") -> middleware("isAdmin");
			Router::get("optionProfile", "App\View\SitePage::optionProfilePage") -> middleware("logged");
			//---------------------FINE RICHIESTE VIEW SITEPAGE
			
			//---------------------INIZIO RICHIESTE VIEW USER
			Router::get("notAdmin", "App\View\User::notAdminPage");
			//---------------------FINE RICHIESTE VIEW USER
			
			//---------------------INIZIO RICHIESTE VIEW ERROR
			Router::get("error", 'App\View\Error::errorRequestConnection');
			//---------------------FINE RICHIESTE VIEW ERROR
			

		}
	}