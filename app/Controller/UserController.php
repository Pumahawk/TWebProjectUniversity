<?php
	namespace App\Controller;
	
	use App\Router;
	use App\Model\User;
	
	class UserController{
		public static function logOut(){
			$_SESSION["utente"] = null;
			\App\Router::process("/");
		}
		
		public static function buy(){
			exit();
			if(!isset($_SESSION["cart"])){
				echo "cart inesistente";
				exit();
			}
			$db = \Bin\Database::connect();
			$query = "INSERT INTO ordini (stato,id_utente) VALUES ('aperto',".$_SESSION["user"]["id"].")";
			$db -> query();
			foreach($_SESSION["cart"] as $idProduct){
				$query = "INSERT INTO venuto";
				//TODO
			}
		}

		public static function registrationJSON(){
			$return["message"] = "error";
			if(isset($_POST["nome"], $_POST["cognome"], $_POST["email"], $_POST["password"], $_POST["indirizzo"]))
				if($user = User::newUser($_POST["nome"], $_POST["cognome"], $_POST["email"], $_POST["password"], $_POST["indirizzo"])){
					$_SESSION["utente"] = $user;
					$return["message"] = "success";
			}
			echo json_encode($return);
		}
		public static function modificaUtenteJSON(){
			$return["message"] = "error";
			if(isset($_POST["nome"], $_POST["cognome"], $_POST["email"], $_POST["indirizzo"]))
				if($user = User::editUser($_SESSION["utente"]["id"], $_POST["nome"], $_POST["cognome"], $_POST["email"], $_POST["indirizzo"])){
					$_SESSION["utente"] = $user;
					$return["message"] = "success";
				}
			echo json_encode($return);
		}
		
		public static function loginJSON(){
			$return["message"] = "error";
			if(isset($_POST["email"], $_POST["password"]))
				if($user = User::login($_POST["email"], $_POST["password"])){
					$_SESSION["utente"] = $user;
					$return["message"] = "success";
				}
			echo json_encode($return);
		}
	}