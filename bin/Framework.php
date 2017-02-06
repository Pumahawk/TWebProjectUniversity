<?php

namespace Bin;

/**
 * Collezione di metodi generici per il funzionamento del framework.
 * 
 * @author Lorenzo
 *
 */

class Framework{
	
	/**
	 * Permette caricare tutti i file php presenti nella cartella specificata
	 * 
	 * @param string $pathDir Percorso della cartella con i file da caricare
	 */
	public static function loadPhpFile($pathDir){
		foreach (glob("$pathDir/*.php") as $filename){
			require_once $filename;
		}
	}
}