<?php

namespace App\View;

class User extends BaseView {
	public function notAdminPage() {
		$page = (new SitePage ());
		$page->CENTER_PAGE = "center_page/no_admin.php";
		$page->requirePage ();
	}
}