<?php
	namespace App\Model;
	use Bin\Database;
	class Product{
		public static function ofUser($id){
			$db = Database::connect();
			$query = "SELECT * FROM ordini WHERE id_utente = $id";
			$risp = $db -> query($query);
			return ($risp -> rowCount() > 0) ? $risp : false;
		}
		public static function allOrders(){
			$db = Database::connect();
			$query = "SELECT * FROM ordini";
			$risp = $db -> query($query);
			return ($risp -> rowCount() > 0) ? $risp : false;
		}
		public static function all(){
			$db = Database::connect();
			$query = "SELECT * FROM prodotti";
			$risp = $db -> query($query);
			return ($risp -> rowCount() > 0) ? $risp : false;
		}
		public static function newProduct($titolo,$immagine, $prezzo,$descrizione){
			$db = Database::connect();
			$query = "INSERT INTO prodotti (titolo, immagine, prezzo, descrizione) VALUES (".$db -> quote($titolo).", ".$db -> quote($immagine).", ".$db -> quote($prezzo).", ".$db -> quote($descrizione).")";
			$risp = $db -> query($query);
			return ($risp) ? User::getById($db -> lastInsertId()): false;
		}

		public static function getFromId($id){
			$db = Database::connect();
			$query = "SELECT * FROM prodotti WHERE prodotti.id = $id";
			return $db -> query($query) -> fetch();;
		}
		public static function getFromOrder($idOrdine){
			$db = Database::connect();
			$query = "SELECT prodotti.titolo as titolo, venduto.prezzo as prezzo FROM prodotti, venduto WHERE venduto.id_ordine = $idOrdine AND venduto.id_prodotto = prodotti.id";
			return $db -> query($query);
		}
	}