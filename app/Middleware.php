<?php
	namespace App;
	
	use Bin\BaseMiddleware;
	
	/**
	 * Classe rappresentante del Middleware.
	 * Il Middleware viene eseguito prima e dopo la richiesta permettendo di 
	 * effettuare particolari controlli.
	 * 
	 * ES:
	 * 
	 * Se c'è un certo gruppo di richieste al server hanno bisogno di un certo 
	 * grado di autorizzazione si puo creare un middleware che si occupa di 
	 * controllare tale autorizzazione e decidere se eseguire continuare 
	 * l'elaborazione della richiesta oppure reindirizzare l'utente verso una 
	 * pagina di errore.
	 * 
	 * @author Lorenzo
	 *
	 */
	
	class Middleware extends BaseMiddleware{
		
		/**
		 * Verica se l'utente che ha fatto la richiesta è autenticato.
		 * Se è autenticato elabora la richiesta altrimenti lo reindirizza alla 
		 * pagina di errore.
		 * 
		 * @param $request Richiesta innoltrata al server.
		 */
		public static function logged($request){
			if(!isset($_SESSION["utente"]) || $_SESSION["utente"] == null)
				Router::process("notLogged");
			else{
				Middleware::process($request);
			}
		}
		
		/**
		 * Verica se l'utente che ha fatto la richiesta è un amministratore.
		 * Se è amministratore elabora la richiesta altrimenti lo reindirizza alla
		 * pagina di errore.
		 *
		 * @param $request Richiesta innoltrata al server.
		 */
		public static function isAdmin($request){
			if(!isset($_SESSION["utente"]) || $_SESSION["utente"] == null || $_SESSION["utente"]["tipo"] != "admin")
				Router::process("notAdmin");
			else
				Middleware::process($request);
		}
	}