
<button class = "btn btn-default" data-toggle="modal" data-target="#newProduct"><span class = "glyphicon glyphicon-plus"></span> Aggiungi</button>
<hr />
<table class="table table-striped">
  	<tr><td>ID</td><td>Titolo</td><td>Azioni</td>
  <?php if($this->productsList != null)foreach ($this->productsList as $ordine):?>
  	<tr><td><?=$ordine["id"]?></td><td><?=$ordine["titolo"]?></td><td><button id = "prodotto" class = "btn-visualizza-prodotto btn btn-default" data-toggle="modal" data-target="#productView" data-id = "<?=$ordine["id"]?>"><span class = "glyphicon glyphicon-eye-open"></span></button></td>
  <?php endforeach;?>
</table>

<?php require $BASE_PATH_TEMPLATE."modal/product_manage.php" ?>