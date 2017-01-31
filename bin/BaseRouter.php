<?php
	namespace Bin;
	
	class BaseRouter{
		
		public static $requestList;
		
		public static function boot(){
		}
		
		public static function get($command, $algorithm){
			BaseRouter::$requestList[$command] = new Request($algorithm);
			return BaseRouter::$requestList[$command];
		}
		
		public static function process($request){
			if(isset(BaseRouter::$requestList[$request]))
				BaseRouter::$requestList[$request] -> process();
			else
				BaseRouter::$requestList['error'] -> process();
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