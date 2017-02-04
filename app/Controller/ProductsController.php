<?php
namespace App\Controller;

use App\Model\Product;
use Bin\Resource;
use App\View\Products;

class ProductController{
	public static function manageOrdersPage(){
		$productList = Product::ofUser($_SESSION["utente"]["id"]);
		(new \App\View\Sitepage) -> manageOrdersPage($productList);
	}
	public static function manageProductsPage(){
		
		if(isset($_POST["titolo"],$_POST["prezzo"],$_POST["descrizione"],$_FILES["foto"])){
			ProductController::newProduct();
		}
		
		$productList = Product::all();
		(new \App\View\Sitepage) -> manageProductsPage($productList);
	}
	
	public static function newProduct(){
		if($name = Resource::saveFile($_FILES["foto"]))
			Product::newProduct($_POST["titolo"],basename($name),$_POST["prezzo"],$_POST["descrizione"]);
	}
	
	public static function getFromId(){
		echo json_encode(Product::getFromId($_GET["id"]));
	}
	
	public static function openImg(){
		$img = $_GET["img"];
		header("Content-Type: image/png");
		echo file_get_contents("../resource/ProductsImages/".$img);
	}
	
	public static function homePage(){
		$prodotti = Product::all();
		(new \App\View\Sitepage) -> homePage($prodotti);
	}
}