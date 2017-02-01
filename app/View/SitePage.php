<?php

	namespace App\View;
	
	class SitePage extends BaseView{
		public function homePage(){
			$this -> $CENTER_PAGE = "center_page/home_center.php";
			(new SitePage()) -> requirePage();
		}
		public static function test(){
			echo "test";
		}
		public function userOptionPage(){
			$this -> MAIN_PAGE = "center_page/user_option_page.php"
			(new SitePage()) -> requirePage();
		}
		public function manageOrdersPage(){
			$this->CENTER_PAGE = "center_page/manage_orders.php";
			(new SitePage()) -> requirePage();
		}
		public function index(){
			$this -> CENTER_PAGE = "center_page/manage_product.php";
			(new SitePage()) -> requirePage();
		}
	}