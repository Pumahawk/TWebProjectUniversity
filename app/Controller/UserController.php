<?php
	namespace App\Controller;
	
	class UserController{
		public static function logOut(){
			session_start();
			$_SESSION["user"] = null;
			\App\Router::process("/");
		}
		public static function logIn(){
			if(!isset($_POST["username"], $_POST["password"]))
			session_start();
			$db = \Bin\Database::connect();
			$query = "SELECT  FROM utenti WHERE (username = '".$_POST["username"]."' AND password = '".$_POST["password"]."')";
			$res = $db -> query();
			if($res -> rowCount() > 0){
				$_SESSION["user"] = $res -> fetch();
			}
			\App\Router::process("/");
		}
		
		public static function buy(){
			echo "to complate";
			exit();
			session_start();
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
	}