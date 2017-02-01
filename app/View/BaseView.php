<?php
	namespace App\View;
	
	
	class BaseView {
		public $MAIN_PAGE = "base.php";
		
		public function requirePage(){
			$CENTER_PAGE = "page_not_found.php";
			require_once "../App/Template/".$this->MAIN_PAGE;
		}
		
	}