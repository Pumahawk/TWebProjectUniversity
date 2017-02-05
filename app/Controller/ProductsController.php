<?php
namespace App\Controller;

use App\Model\Product;
use Bin\Resource;
use App\Model\Order;

class ProductController{
	public static function manageOrdersPage(){
		if($_SESSION["utente"]["tipo"] == "admin")
			$productList = Product::allOrders();
		else
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

	public static function addToCart(){
		$return["message"] = "error";
		if($pr = Product::getFromId($_GET["id"])){
			$_SESSION["cart"][] = $pr;
			$return["message"] = "success";
		}
		echo json_encode($return);
	}
	public static function removeProductfromCart(){
		$return["message"] = "success";
		foreach ($_SESSION["cart"] as $k => $pr){
			if($pr["id"] == $_GET["id"])
				unset($_SESSION["cart"][$k]);
				break;
			}
		echo json_encode($return);
	}

	public static function buy(){
		$return["message"] = "error";
		if(isset($_SESSION['utente'], $_SESSION["cart"]) && count($_SESSION["cart"]) > 0){
			Order::buy($_SESSION["cart"], $_SESSION["utente"]["id"]);
			unset($_SESSION["cart"]);
			$return["message"] = "success";
		}
		echo json_encode($return);
	}
	public static function getProdOrder(){
		$products = Product::getFromOrder($_GET["id"]);
		$totale = 0;
		?>
      	 <div class="list-group text-center">
      	 <?php foreach($products as $prod):
      	 $totale += $prod["prezzo"];?>
		  <a class="list-group-item" data-toggle="collapse">Titolo: <strong><?=$prod["titolo"]?></strong>Prezzo: <strong><?=$prod["prezzo"]?></strong></a>
		<?php endforeach;
		?></div>
		<hr> Totale: <?= $totale?> <?php 
	}
	public static function setCons(){
		$return["message"] = "success";
		Order::setCons($_GET["id"]);
		echo json_encode($return);
	}
}