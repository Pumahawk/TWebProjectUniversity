<?php
	namespace App\Controller;
	
	use App\Router;
	use App\Model\User;
	
	/**
	 * Controller che gestisce le richieste che riguardano un utente
	 * @author Lorenzo
	 *
	 */
	class UserController{
		
		/**
		 * Rispnde alla richiesta di logout ed elimina dalla sessione l'utente.
		 */
		public static function logOut(){
			$_SESSION["utente"] = null;
			\App\Router::process("/");
		}

		/**
		 * Effettua la registrazione dell'utente e risponde in formato JSON al client.
		 */
		public static function registrationJSON(){
			$return["message"] = "error";
			$return["text"] = "Impossibile registrarsi. Email gia presente.";
			if(isset($_POST["nome"], $_POST["cognome"], $_POST["email"], $_POST["password"], $_POST["indirizzo"]))
				if($user = User::newUser($_POST["nome"], $_POST["cognome"], $_POST["email"], $_POST["password"], $_POST["indirizzo"])){
					$_SESSION["utente"] = $user;
					$return["message"] = "success";
					$return["text"] = "Registrazione avvenuta con successo.";
			}
			echo json_encode($return);
		}
		
		/**
		 * Modifica le informazioni di un utente e risponde in formato JSON
		 */
		public static function modificaUtenteJSON(){
			$return["message"] = "error";
			$return["text"] = "Impossibile modificare il proprio profilo. Email gia presente.";
			if(isset($_POST["nome"], $_POST["cognome"], $_POST["email"], $_POST["indirizzo"]))
				if($user = User::editUser($_SESSION["utente"]["id"], $_POST["nome"], $_POST["cognome"], $_POST["email"], $_POST["indirizzo"])){
					$_SESSION["utente"] = $user;
					$return["message"] = "success";
					$return["text"] = "Modifica avvenuta con successo.";
				}
			echo json_encode($return);
		}
		
		/**
		 * Effettua il login di un utente e risponde in formato JSON
		 */
		public static function loginJSON(){
			$return["message"] = "error";
			$return["text"] = "Impossibile effettuare il login. Riprova piu tardi.";
			if(isset($_POST["email"], $_POST["password"]))
				if($user = User::login($_POST["email"], $_POST["password"])){
					$_SESSION["utente"] = $user;
					$return["message"] = "success";
					$return["text"] = "Login avvenuto con successo.";
				}
			echo json_encode($return);
		}
	}