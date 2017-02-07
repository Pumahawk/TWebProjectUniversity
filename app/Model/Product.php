<?php
	namespace App\Model;
	use Bin\Database;
	
	/**
	 * Collezione di metodi che riguardano i prodotti
	 * @author Lorenzo
	 *
	 */
	class Product{
		
		/**
		 * Restituisce tutti gli ordini di un utente
		 * @param unknown $id
		 * @return boolean|PDOStatement
		 */
		public static function ofUser($id){
			$db = Database::connect();
			$query = "SELECT * FROM ordini WHERE id_utente = {$db->quote($id)} ORDER BY data DESC";
			$risp = $db -> query($query);
			return ($risp -> rowCount() > 0) ? $risp : false;
		}
		
		/**
		 * Restituisce tutti gli ordini effettuati presenti nel database
		 * @return boolean|PDOStatement
		 */
		public static function allOrders(){
			$db = Database::connect();
			$query = "SELECT * FROM ordini ORDER BY data DESC";
			$risp = $db -> query($query);
			return ($risp -> rowCount() > 0) ? $risp : false;
		}
		
		/**
		 * Restituisce tutti i prodotti presenti nel database
		 * @return boolean|PDOStatement
		 */
		public static function all(){
			$db = Database::connect();
			$query = "SELECT * FROM prodotti";
			$risp = $db -> query($query);
			return ($risp -> rowCount() > 0) ? $risp : false;
		}
		
		/**
		 * Inserisce un nuovo prodotto all'interno del database
		 * 
		 * @param unknown $titolo
		 * @param unknown $immagine
		 * @param unknown $prezzo
		 * @param unknown $descrizione
		 * @return boolean|mixed
		 */
		public static function newProduct($titolo,$immagine, $prezzo,$descrizione){
			$db = Database::connect();
			$query = "INSERT INTO prodotti (titolo, immagine, prezzo, descrizione) VALUES (".$db -> quote($titolo).", ".$db -> quote($immagine).", ".$db -> quote($prezzo).", ".$db -> quote($descrizione).")";
			$risp = $db -> query($query);
			return ($risp) ? User::getById($db -> lastInsertId()): false;
		}

		/**
		 * Restituisce le informazioni di un prodotto in base al suo id.
		 * 
		 * @param unknown $id
		 * @return mixed
		 */
		public static function getFromId($id){
			$db = Database::connect();
			$query = "SELECT * FROM prodotti WHERE prodotti.id = {$db->quote($id)}";
			return $db -> query($query) -> fetch();;
		}
		
		/**
		 * Restituisce tutti i prodotti di un ordine, di cui viene specificato l'id,
		 * 
		 * 
		 * @param unknown $idOrdine
		 * @return PDOStatement
		 */
		public static function getFromOrder($idOrdine){
			$db = Database::connect();
			$query = "SELECT prodotti.titolo as titolo, venduto.prezzo as prezzo FROM prodotti, venduto WHERE venduto.id_ordine = {$db->quote($idOrdine)} AND venduto.id_prodotto = prodotti.id";
			return $db -> query($query);
		}
	}