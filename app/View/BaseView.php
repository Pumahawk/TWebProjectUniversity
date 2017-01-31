<?php
	namespace App\View;
	
	
	class BaseView {
		public $MAIN_PAGE = "base.php";
		public $CENTER_PAGE = "page_not_found.php";
		
		public function requirePage(){
			require_once "../App/Template/".$this->MAIN_PAGE;
		}
		
	}