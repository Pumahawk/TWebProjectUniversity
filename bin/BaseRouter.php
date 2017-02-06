<?php
	namespace Bin;
	
	/**
	 * Classe contenente tutti i metodi per il funzionamento del Router.
	 * 
	 * @author Lorenzo
	 *
	 */
	
	class BaseRouter{
		
		/**
		 * Elenco di tute le richieste che possono essere gestite.
		 * @var Request
		 */
		private static $requestList;
		
		/**
		 * Metodo che permette di inserire la gestione delle richiesta al server.
		 */
		public static function boot(){
		}
		
		/**
		 * Permette di inserire una richiesta che il Router deve reindirizzare.
		 * @param string $command
		 * @param string $algorithm
		 */
		public static function get($command, $algorithm){
			BaseRouter::$requestList[$command] = new Request($algorithm);
			return BaseRouter::$requestList[$command];
		}
		
		/**
		 * Permette di processare una determinata richiesta.
		 * @param string $request nome della richiesta.
		 */
		public static function process($request){
			if(isset(BaseRouter::$requestList[$request]))
				BaseRouter::$requestList[$request] -> process();
			else
				BaseRouter::$requestList['error'] -> process();
		}
	}
	
	/**
	 * Classe che identifica le richieste che vengono effettuate sul server.
	 * La richiesta è costituita da un nome, un array di parametri, il nome del metodo
	 * del controller da eseguire, il nome del middleware.
	 * 
	 * @author Lorenzo
	 *
	 */
	class Request{
		public $name;
		public $params;
		public $action;
		public $middleware;
		
		/**
		 * Costruttore che inzializza la richiesta
		 * 
		 * @param string $action
		 */
		public function __construct($action){
			$this -> params = null;
			$this -> action = $action;
			$this -> middleware = null;
		}
		
		/**
		 * Lista di parametri passati direttamente al metodo a cui la richiesta viene 
		 * reindirizzata.
		 * 
		 * @param unknown ...$params Array di parametri
		 * @return \Bin\Request restituisce la richiesta appena modificata
		 */
		public function params(...$params){
			$this -> params = $params;
			return $this;
		}
		
		/**
		 * Metodo del controller da richiamare 
		 * 
		 * @param string $action
		 * @return \Bin\Request restituisce la richiesta appena modificata
		 */
		public function action($action){
			$this -> action = $action;
			return $this;
		}
		
		/**
		 * Permette di associare un middleware alla richiesta.
		 * 
		 * @param unknown $middleware
		 * @return \Bin\Request
		 */
		public function middleware($middleware){
			$this -> middleware = $middleware;
			return $this;
		}
		
		/**
		 * Esegue la richiesta controllando la presenza di un middleware.
		 * In caso il middleware sia presente la richiesta viene innoltrata al 
		 * middleware specificato.
		 */
		public function process(){
			if($this -> middleware != null)
				call_user_func("App\Middleware::" .$this -> middleware, $this);
			else 
				call_user_func($this -> action, $this -> params);
		}
	}