<?php

	namespace App\View;
	
	class SitePage extends BaseView{
		public function homePage(){
			$page = (new SitePage());
			$page -> CENTER_PAGE = "center_page/home_center.php";
			$page -> requirePage();
		}
		public static function test(){
			echo "test";
		}
		public function userOptionPage(){
			$page = (new SitePage());
			$page -> MAIN_PAGE = "center_page/user_option_page.php";
			$page -> requirePage();
		}
		public function manageOrdersPage(){
			$page = (new SitePage());
			$page -> CENTER_PAGE = "center_page/manage_orders.php";
			$page -> requirePage();
		}
		public function manageProductsPage(){
			$page = (new SitePage());
			$page -> CENTER_PAGE = "center_page/manage_product.php";
			$page -> requirePage();
		}
		public function contactPage(){
			$page = (new SitePage());
			$page -> CENTER_PAGE = "center_page/contact.php";
			$page -> requirePage();
		}
		public function optionProfilePage(){
			$page = (new SitePage());
			$page -> CENTER_PAGE = "center_page/user_option_page.php";
			$page -> requirePage();
		}
	}