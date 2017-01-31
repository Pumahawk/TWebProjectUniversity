<?php
	namespace App\View;
	
	class User extends BaseView{
		public $CENTER_PAGE = "center_page/user_option_page.php";
		public function index(){
			(new User()) -> requirePage();
		}
	}