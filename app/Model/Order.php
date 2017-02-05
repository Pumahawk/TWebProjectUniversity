<?php
	namespace App\Model;
	
	use Bin\Database;
	
	class Order{
		public static function buy($prdList, $idUser){
			$db = Database::connect();
			$query = "INSERT INTO ordini (id_utente, stato) VALUES ($idUser, 'in_consegna')";
			$db ->query($query);
			$idOrd = $db -> lastInsertId();
			foreach($prdList as $pr){
				$query = "INSERT INTO venduto (id_ordine, id_prodotto, prezzo) VALUES ($idOrd, ".$pr["id"].", '".$pr["prezzo"]."')";
				$db ->query($query);
			}
		}
		public static function setCons($idOrder){
			$db = Database::connect();
			$query = "UPDATE ordini SET stato = 'consegnato' WHERE $idOrder";
			$db ->query($query);
		}
	}