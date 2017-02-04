<table class="table table-striped">
  	<tr><td>ID</td><td>Data</td><td>Stato</td><td>Azioni</td>
  <?php if($this->productsList != null)foreach ($this->productsList as $ordine):?>
  	<tr><td><?=$ordine["id"]?></td><td><?=$ordine["data"]?></td><td><?=$ordine["stato"]?></td><td>Pulsanti...</td>
  <?php endforeach;?>
</table>