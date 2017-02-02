<?php 
$ordini_test = [ 
		[
				"id" => 0,
				"data" => "20170202",
				"stato" => "aperto"],[
				"id" => 0,
				"data" => "20170202",
				"stato" => "aperto"],[
				"id" => 0,
				"data" => "20170202",
				"stato" => "aperto"]
		
		 
];
//var_dump($ordini_test);
?><table class="table table-striped">
  	<tr><td>ID</td><td>Data</td><td>Stato</td><td>Azioni</td>
  <?php foreach ($ordini_test as $ordine):?>
  	<tr><td><?=$ordine["id"]?></td><td><?=$ordine["data"]?></td><td><?=$ordine["stato"]?></td><td>Pulsanti...</td>
  <?php endforeach;?>
</table>