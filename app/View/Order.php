<?php
	namespace App\View;
	
	class Order extends BaseView{
		public $CENTER_PAGE = "center_page/manage_orders.php";
		public function index(){
			(new Order()) -> requirePage();
		}
	}