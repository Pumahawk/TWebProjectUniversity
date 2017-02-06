<table class="table table-striped">
  	<tr><td>ID</td><td>Data</td><td>Stato</td><td>Azioni</td>
  <?php if($this->productsList != null)foreach ($this->productsList as $ordine):?>
  	<tr><td><?=$ordine["id"]?></td><td><?=$ordine["data"]?></td><td><?=($ordine["stato"] == "in_consegna") ? "Prodotto in fase di elaborazione" : "Prodotto consegnato"?></td><td>
  	<button class = "btn btn-default btn-visualizza-ordine" data-toggle="modal" data-id="<?= $ordine["id"]?>" data-target="#orderView"><span class = "glyphicon glyphicon-eye-open"></span></button>
  	<?php if($_SESSION["utente"]["tipo"] == "admin" && $ordine["stato"] == "in_consegna"):?> <button data-id = "<?= $ordine["id"]?>" class = "set-to-cons btn btn-default">Consegna</button>
  	<?php endif;?></td>
  <?php endforeach;?>
</table>

<?php require $BASE_PATH_TEMPLATE."modal/orders_manage.php" ?>