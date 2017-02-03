<?php
	namespace App\Model;
	use Bin\Database;
	class User{

		public static function newUser($nome, $cognome, $email, $indirizzo){
			$db = Database::connect();
			$query = "INSERT INTO utenti (nome, cognome, email, password, indirizzo, tipo) VALUES (".$db -> quote($nome).", ".$db -> quote($cognome).", ".$db -> quote($email).", ".$db -> quote($password).", ".$db -> quote($indirizzo).", 'normal')";
			$risp = $db -> query($query);
			return ($risp) ? User::getById($db -> lastInsertId()): false;
		}
		public static function editUser($id, $nome, $cognome, $email, $indirizzo){
			$db = Database::connect();
			$query = "UPDATE utenti SET nome = ".$db -> quote($nome).",  cognome = ".$db -> quote($cognome).", email = ".$db -> quote($email).", indirizzo = ".$db -> quote($indirizzo).") WHERE id = ".$id;
			$risp = $db -> query($query);
			if($risp){
			}
			return ($risp) ? User::getById($id): false;
		}

		public static function getById($id){
			$db = Database::connect();
			$query = "SELECT * FROM utenti WHERE id = $id";
			$risp = $db -> query($query);
			return ($risp -> rowCount() > 0) ? $risp -> fetch() : false;
		}
		public static function login($email, $password){
			$db = Database::connect();
			$query = "SELECT * FROM utenti WHERE email = ".$db->quote($email)." AND password = ".$db->quote($password);
			$risp = $db -> query($query);
			return ($risp -> rowCount() > 0) ? $risp -> fetch() : false;
		}
		
	}