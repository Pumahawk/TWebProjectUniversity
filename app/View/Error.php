<?php
	namespace App\View;
	
	class Error extends BaseView{
		public function errorRequestConnection(){
			$page = (new Error());
			$page -> CENTER_PAGE = "page_not_found.php";
			$page -> requirePage();
		}
	}