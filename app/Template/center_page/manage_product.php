<?php 
$ordini_test = [ 
		[
				"id" => 0,
				"titolo" => "20170202",
				"descrizione" => "aperto"],[
				"id" => 0,
				"titolo" => "20170202",
				"descrizione" => "aperto"],[
				"id" => 0,
				"titolo" => "20170202",
				"descrizione" => "aperto"]
		
		 
];
//var_dump($ordini_test);
?><table class="table table-striped">
  	<tr><td>ID</td><td>Titolo</td><td>Azioni</td>
  <?php foreach ($ordini_test as $ordine):?>
  	<tr><td><?=$ordine["id"]?></td><td><?=$ordine["titolo"]?></td><td>Pulsanti...</td>
  <?php endforeach;?>
</table>