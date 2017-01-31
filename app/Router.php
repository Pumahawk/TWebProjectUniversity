<?php
	namespace App;
	
	class Router{
		
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
		}
		
		public static function get($command, $algorithm){
			Router::$requestList[$command] = new Request($algorithm);
			return Router::$requestList[$command];
		}
		
		public static function process($request){
			if(isset(Router::$requestList[$request]))
				Router::$requestList[$request] -> process();
		}

		public static function helloword(){
			echo "Hello Word!";
		}
		
		public static function test(){
			var_dump(Router::$requestList);
		}
	}
	
	class Request{
		public $name;
		public $params;
		public $action;
		public $middleware;
		
		public function __construct($action){
			$this -> params = null;
			$this -> action = $action;
			$this -> middleware = null;
		}
		
		public function params(...$params){
			$this -> params = $params;
			return $this;
		}
		
		public function action($action){
			$this -> action = $action;
			return $this;
		}
		
		public function middleware($middleware){
			$this -> middleware = $middleware;
			return $this;
		}
		
		public function process(){
			if($this -> middleware != null)
				call_user_func("App\Middleware::" .$this -> middleware, $this);
			else 
				call_user_func($this -> action, $this -> params);
		}
	}