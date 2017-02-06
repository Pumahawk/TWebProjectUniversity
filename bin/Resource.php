<?php
namespace Bin;

/**
 * Resource mette a disposizione una collezione di metodi che permettono di 
 * organizzare i file generati dall'applicazione.
 * 
 * @author Lorenzo Gandino
 *
 */

class Resource{
	
	/**
	 * Si occupa di memorizzare un file appena caricato sul server e di memorizzarlo
	 * in una posizione specifica nella cartella resource.
	 * Il metodo si occupa di gestire la presenza di file con lo stesso nome generandone
	 * uno casuale.
	 * 
	 * @param array $file Consiste nella variabile $_FILE["{nome_variabile}"]
	 * @param string $path Destinazione all'interno della cartella resource.
	 * @return string|boolean Restituisce il nome del file appena salvato.
	 * false altrimenti.
	 */
	
	public static function saveUploadedFile($file, $path){
		$uploaddir = '../resource/'.$path;
		$userfile_tmp = $file['tmp_name'];
		$userfile_name = basename($file['tmp_name']);
		$save = $uploaddir . $userfile_name;
		$i = 0;
		while(file_exists($save.($i))){
			$i++;
		}
		$save = $save.$i;
		if (move_uploaded_file($userfile_tmp, $save)) {
			return $save;
		}else{
			return false;
		}
	}
	
	/**
	 * Legge un file come parametro e restituisce il suo contenuto in una stringa
	 * @param string $file Percorso del file all'interno della cartella resource.
	 * @return string il contenuto del file.
	 */
	
	public static function readFile($file){
		$file =	file_get_contents("../resource/".$file);
		return $file;
	}
}