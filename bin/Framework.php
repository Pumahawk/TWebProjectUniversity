<?php

namespace Framework;
class Framework{
	public static function loadPhpFile($pathDir){
		foreach (glob("$pathDir/*.php") as $filename){
			require $filename;
		}
	}
}