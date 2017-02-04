<?php
namespace Bin;

class Resource{
	
	public static function saveFile($file){
		$uploaddir = '../resource/ProductsImages/';
		$userfile_tmp = $file['tmp_name'];
		$userfile_name = basename($file['tmp_name']);
		$save = $uploaddir . $userfile_name;
		$i = 0;
		while(file_exists($save.($i))){
			$i++;
		}
		$save = $save.$i;
		if (move_uploaded_file($userfile_tmp, $save)) {
			return $save;
		}else{
			return false;
		}
	}
}