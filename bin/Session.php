<?php

namespace Bin;

class Session{
	
	public static function set($name, $value){
		session_start();
		$_SESSION[$name] = $value;
		session_close();
	}
	
	public static function get($name, $value){
		session_start();
		$var = $_SESSION[$name];
		session_close();
		return $var;
	}
	
	public static function destroy(){
		session_destroy();
	}
}