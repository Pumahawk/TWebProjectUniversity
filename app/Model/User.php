<?php
	namespace App\Model;
	
	class User{

		public $id;
		public $email;
		public $nome;
		public $cognome;
		public $indirizzo;
		public $tipo;
		
		private function __construct(){
			
		}
		
		public static function login($email, $password){
			//TODO funzione da implementare
		}
		
		public function logout(){
			//TODO function da implementare
		}

		public static function getFromEmail($email){
			//TODO function da implementare
		}
		
		public static function getFromId($email){
			//TODO function da implementare
		}
		
		public function getOrders(){
			//TODO function da implementare
		}
		
		public function makeOrdersFromCart(){
			//TODO function da implementare
		}
		
		
		public function addProductToCart($id){
			//TODO function da implementare
		}
		
		public function getCart(){
			//TODO function da implementare
		}
		
		public function getAllOrders(){
			//TODO function da implementare
		}
		
		public function getAllOrdersAdmin(){
			//TODO function da implementare
		}
	}