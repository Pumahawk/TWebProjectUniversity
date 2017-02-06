<?php

namespace Bin;

/**
 * Collezione di metodi per la gestione al database.
 * 
 * @author Lorenzo
 *
 */

class Database{
	
	/**
	 * Restituisce l'oggetto della classe PDO connesso al database.
	 * @return \PDO|NULL
	 */
	public static function connect(){
		/* Connect to a MySQL database using driver invocation */
		$dsn = 'mysql:dbname='.DATABASE_NAME.';host='.DATABASE_HOST;
		$user = DATABASE_USERNAME;
		$password = DATABASE_PASSWORD;
		
		try {
			return new \PDO($dsn, $user, $password);
		} catch (PDOException $e) {
			return null;
		}
		
	}
}