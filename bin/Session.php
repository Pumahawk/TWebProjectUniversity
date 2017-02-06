<?php

namespace Bin;

/**
 * Classe che mette a disposizione una serie di metodi per gestire la sessione.
 * 
 * @author Lorenzo
 *
 */

class Session{
	
	/**
	 * Permette di settare una variabile all'interno della sessione.
	 * 
	 * @param unknown $name chiave dell'array sessione.
	 * @param unknown $value il valore da memorizzare nella sessione.
	 */
	public static function set($name, $value){
		session_start();
		$_SESSION[$name] = $value;
		session_close();
	}
	
	/**
	 * Permette di prendere un valore all'interno della sessione.
	 * 
	 * @param unknown $name Parola chiave del valore memorizzato nella sessione
	 * @return unknown
	 */
	public static function get($name){
		session_start();
		$var = $_SESSION[$name];
		session_close();
		return $var;
	}
	
	/**
	 * Permette di distruggere la sessione.
	 */
	public static function destroy(){
		session_destroy();
	}
}