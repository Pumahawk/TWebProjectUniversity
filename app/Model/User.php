<?php
	namespace App\Model;
	use Bin\Database;
	
	/**
	 * Collezione di metodi che riguardano i gli utenti
	 * @author Lorenzo
	 *
	 */
	class User{
	
		/**
		 * Aggiunge un nuovo utente nel database
		 * @param string $nome
		 * @param string $cognome
		 * @param string $email
		 * @param string $password
		 * @param string $indirizzo
		 * 
		 * @return boolean|mixed Restituisce un array contenente le informazioni
		 * dell'utente appena inserito nel database.
		 * false altrimenti.
		 */
		public static function newUser($nome, $cognome, $email, $password, $indirizzo){
			$db = Database::connect();
			$query = "INSERT INTO utenti (nome, cognome, email, password, indirizzo, tipo) VALUES (".$db -> quote($nome).", ".$db -> quote($cognome).", ".$db -> quote($email).", ".$db -> quote($password).", ".$db -> quote($indirizzo).", 'normal')";
			$risp = $db -> query($query);
			return ($risp) ? User::getById($db -> lastInsertId()): false;
		}
		
		/**
		 * Modifica un utente inserendo le nuove indormazioni.
		 * 
		 * @param unknown $id
		 * @param unknown $nome
		 * @param unknown $cognome
		 * @param unknown $email
		 * @param unknown $indirizzo
		 * @return boolean|mixed Restituisce l'utente modificato,
		 * false se non dovesse riuscire a modificare l'utente.
		 */
		public static function editUser($id, $nome, $cognome, $email, $indirizzo){
			$db = Database::connect();
			$query = "UPDATE utenti SET nome = ".$db -> quote($nome).",  cognome = ".$db -> quote($cognome).", email = ".$db -> quote($email).", indirizzo = ".$db -> quote($indirizzo)." WHERE id = ".$db->quote($id);
			$risp = $db -> query($query);
			if($risp){
			}
			return ($risp) ? User::getById($id): false;
		}

		/**
		 * Restituisce le informazioni di un utente prelevandole dal database
		 * 
		 * @param unknown $id
		 * @return boolean|mixed
		 */
		public static function getById($id){
			$db = Database::connect();
			$query = "SELECT * FROM utenti WHERE id = {$db->quote($id)}";
			$risp = $db -> query($query);
			return ($risp -> rowCount() > 0) ? $risp -> fetch() : false;
		}
		
		/**
		 * Effettua il login di un utente.
		 * 
		 * @param unknown $email
		 * @param unknown $password
		 * @return boolean|mixed
		 * Restituisce le informazioni dell'utente in caso il login vada a buon fine
		 * false altrimenti.
		 */
		public static function login($email, $password){
			$db = Database::connect();
			$query = "SELECT * FROM utenti WHERE email = ".$db->quote($email)." AND password = ".$db->quote($password);
			$risp = $db -> query($query);
			return ($risp -> rowCount() > 0) ? $risp -> fetch() : false;
		}
		
	}