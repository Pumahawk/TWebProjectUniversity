<table class="table table-striped">
  	<tr><td>ID</td><td>Data</td><td>Stato</td><td>Azioni</td>
  <?php if($this->productsList != null)foreach ($this->productsList as $ordine):?>
  	<tr class = "<?= $ordine["stato"] == "in_consegna" ? "info" : "success "?>"><td><?=$ordine["id"]?></td><td><?=$ordine["data"]?></td><td><?=($ordine["stato"] == "in_consegna") ? "<span data-toggle='tooltip' data-placement='bottom' title='Prodotto in elaborazione' class ='glyphicon glyphicon-option-horizontal'></span>" : "<span data-toggle='tooltip' data-placement='bottom' title='Prodotto spedito' class = 'glyphicon glyphicon-ok'></span>"?></td><td>
  	<button class = "btn btn-default btn-visualizza-ordine" data-toggle="modal" data-id="<?= $ordine["id"]?>" data-target="#orderView"><span class = "glyphicon glyphicon-eye-open"></span></button>
  	<?php if($_SESSION["utente"]["tipo"] == "admin" && $ordine["stato"] == "in_consegna"):?> <button data-id = "<?= $ordine["id"]?>" class = "set-to-cons btn btn-default">Consegna</button>
  	<?php endif;?></td>
  <?php endforeach;?>
</table>

<?php require $BASE_PATH_TEMPLATE."modal/orders_manage.php" ?>