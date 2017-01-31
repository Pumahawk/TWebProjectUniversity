<?php
	namespace App\View;
	
	class Products extends BaseView{
		public $CENTER_PAGE = "center_page/manage_product.php";
		public function index(){
			(new Products()) -> requirePage();
		}
	}