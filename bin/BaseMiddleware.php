<?php

namespace Bin;

/**
 * Classe contente i metodi che permettono il corretto funzionamento di un
 * middleware
 * 
 * @author Lorenzo Gandino
 *
 */

class BaseMiddleware{
	
	/**
	 * Metodo che lancia la richiesta. 
	 * 
	 * @param unknown $request
	 */
	public static function process($request){
		call_user_func($request -> action, $request -> params);
	}
}