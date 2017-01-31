<?php
namespace App\View;

class Test extends BaseView {
	public static function test(){
		require_once Test::$MAIN_PAGE;
	}
}