<?php

	namespace App\View;
	
	class SitePage extends BaseView{
		public $productList;
		public function homePage($productsList){
			$page = (new SitePage());
			$page -> productsList = $productsList;
			$page -> CENTER_PAGE = "center_page/home_center.php";
			$page -> requirePage();
		}
		public static function test(){
			echo "test";
		}
		public function userOptionPage(){
			$page = (new SitePage());
			$page -> CENTER_PAGE = "center_page/user_option_page.php";
			$page -> requirePage();
		}
		public function registrationPage(){
			$page = (new SitePage());
			$page -> CENTER_PAGE = "center_page/registration.php";
			$page -> requirePage();
		}
		public function optionProductPage(){
			$page = (new SitePage());
			$page -> CENTER_PAGE = "center_page/option_product.php";
			$page -> requirePage();
		}
		public function manageOrdersPage($productsList){
			$page = (new SitePage());
			$page -> productsList = $productsList;
			$page -> CENTER_PAGE = "center_page/manage_orders.php";
			$page -> requirePage();
		}
		public function manageProductsPage($productsList){
			$page = (new SitePage());
			$page -> productsList = $productsList;
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