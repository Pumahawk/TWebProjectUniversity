<?php

namespace Bin;
class Framework{
	public static function loadPhpFile($pathDir){
		foreach (glob("$pathDir/*.php") as $filename){
			require_once $filename;
		}
	}
}