<?php

namespace Bin;

class Database{
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

Database::connect();