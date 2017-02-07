<?php
	namespace App\Model;
	
	use Bin\Database;
	
	/**
	 * Collezione di funzioni che riguardano un ordine
	 * @author Lorenzo
	 *
	 */
	class Order{
		
		/**
		 * Crea un ordine inserendo una lista di ordini e l'id di un utente
		 * @param unknown $prdList
		 * @param unknown $idUser
		 */
		public static function buy($prdList, $idUser){
			$db = Database::connect();
			$query = "INSERT INTO ordini (id_utente, stato) VALUES ({$db->quote($idUser)}, 'in_consegna')";
			$db ->query($query);
			$idOrd = $db -> lastInsertId();
			foreach($prdList as $pr){
				$query = "INSERT INTO venduto (id_ordine, id_prodotto, prezzo) VALUES ({$db->quote($idOrd)}, {$db->quote($pr["id"])}, {$db->quote($pr["prezzo"])})";
				$db ->query($query);
			}
		}
		
		/**
		 * Marchia come consegnato un ordine specificato dall'id.
		 * @param unknown $idOrder
		 */
		public static function setCons($idOrder){
			$db = Database::connect();
			$query = "UPDATE ordini SET stato = 'consegnato' WHERE id = {$db->quote($idOrder)}";
			$db ->query($query);
		}
		
		public static function getUser($idOrder){
			$db = Database::connect();
			$query = "SELECT utenti.nome as nome, utenti.cognome as cognome, utenti.email as email, utenti.indirizzo as indirizzo, utenti.tipo as tipo FROM utenti, ordini WHERE ordini.id_utente = utenti.id AND ordini.id = {$db->quote($idOrder)}";
			$risp = $db -> query($query);
			return ($risp -> rowCount() > 0) ? $risp -> fetch() : false;
		}
	}