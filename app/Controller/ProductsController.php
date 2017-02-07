<?php
namespace App\Controller;

use App\Model\Product;
use Bin\Resource;
use App\Model\Order;

/**
 * Controller a cui vendono innoltrate tutte le richieste al server che riguardano i prodotti
 * e gli ordini.
 * @author Lorenzo
 *
 */

class ProductController{
	
	/**
	 * Gestisce la richiesta manageOrdersPage. La richiesta consiste nel venere
	 *  la pagina degli ordini.
	 *  L'utente vede i suoi ordini e il loro stato mentre l'amministratore vede
	 *  tutti gli ordini e decide quali segnare come consegnati.
	 */
	public static function manageOrdersPage(){
		if($_SESSION["utente"]["tipo"] == "admin")
			$productList = Product::allOrders();
		else
			$productList = Product::ofUser($_SESSION["utente"]["id"]);
		(new \App\View\Sitepage) -> manageOrdersPage($productList);
	}
	
	/**
	 * Pagina adedicata all'amministrare. Mostra tutti i prodotti caricati sul sito internet.
	 * Puo anche creare nuovi prodotti attraverso questa pagina.
	 * La funzione si occupa anche di creare nuovi prodotti e di uploadare correttamente
	 * le foto.
	 */
	public static function manageProductsPage(){
		
		if(isset($_POST["titolo"],$_POST["prezzo"],$_POST["descrizione"],$_FILES["foto"])){
			ProductController::newProduct();
		}
		
		$productList = Product::all();
		(new \App\View\Sitepage) -> manageProductsPage($productList);
	}
	
	/**
	 * Metodo che gestisce il caricamente di un nuovo prodotto. Gestisce ail salvataggio
	 * dell'immagine del prodotto.
	 */
	public static function newProduct(){
		if($name = Resource::saveUploadedFile($_FILES["foto"], "ProductsImages/"))
			Product::newProduct($_POST["titolo"],basename($name),$_POST["prezzo"],$_POST["descrizione"]);
	}
	
	/**
	 * Restituisce le informazioni di un prodotto direttamente al client in formato JSON
	 */
	public static function getFromId(){
		echo json_encode(Product::getFromId($_GET["id"]));
	}
	
	
	/**
	 * Permette di aprire un'immagine richiesta dal client
	 */
	public static function openImg(){
		$img = $_GET["img"];
		header("Content-Type: image/png");
		echo Resource::readFile("ProductsImages/".$img);
	}
	
	/**
	 * Gestisce la visualizzazione della homepage
	 */
	public static function homePage(){
		$prodotti = Product::all();
		(new \App\View\Sitepage) -> homePage($prodotti);
	}

	/**
	 * Aggiunge un prodotto al carrello
	 */
	public static function addToCart(){
		$return["message"] = "error";
			$return["text"] = "Impossibile aggiungere il prodotto al carrello. Riprovare piu tardi.";
		
		if($pr = Product::getFromId($_GET["id"])){
			$_SESSION["cart"][] = $pr;
			$return["message"] = "success";
			$return["text"] = "Prodotto aggiunto al carrello con successo.";
		}
		echo json_encode($return);
	}
	
	/**
	 * Rimuove un prodotto dal carrello
	 */
	public static function removeProductfromCart(){
		$return["message"] = "success";
		$return["text"] = "Prodotto rimosso dal carrello con successo.";
		foreach ($_SESSION["cart"] as $k => $pr)
			if(\strcmp($pr["id"], $_GET["id"]) == 0){
				unset($_SESSION["cart"][$k]);
				break;
			}
		echo json_encode($return);
	}

	/**
	 * Crea un ordine con tutti i prodotti nel carrello e svuotando quest'ultimo.
	 */
	public static function buy(){
		$return["message"] = "error";
		$return["text"] = "Impossibile creare un ordine in questo momento. Riprovare piu tardi.";
		
		if(isset($_SESSION['utente'], $_SESSION["cart"]) && count($_SESSION["cart"]) > 0){
			Order::buy($_SESSION["cart"], $_SESSION["utente"]["id"]);
			unset($_SESSION["cart"]);
			$return["message"] = "success";
			$return["text"] = "Ordine creato con successo";
		}
		echo json_encode($return);
	}
	
	/**
	 * Restituisce i prodotti in un particolare ordine in formato html
	 */
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
		<hr>
		Consegnare a: <?php $user = Order::getUser($_GET["id"]); echo $user["nome"]?> all'indirizzo: <?= $user["indirizzo"]?>
		<hr> Totale: <?= $totale?> <?php 
	}
	
	/**
	 * Permette di settare un ordine come consegnato.
	 */
	public static function setCons(){
		$return["message"] = "success";
		$return["text"] = "Funzione elaborata con successo.";
		
		Order::setCons($_GET["id"]);
		echo json_encode($return);
	}
}