<?php
	namespace App\View;
	
	class Home extends BaseView{
		public $CENTER_PAGE = "center_page/home_center.php";
		public function index(){
			(new Home()) -> requirePage();
		}
	}