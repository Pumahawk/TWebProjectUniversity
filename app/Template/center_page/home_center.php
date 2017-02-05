<div class = "row">
	<?php if($this -> productsList)foreach($this -> productsList as $pr):?>
		<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-offset-0 col-lg-offset-0 col-md-3 .col-lg-2 ">
			<div class="thumbnail "> 
			<img alt="100%x200" data-src="holder.js/100%x200" src="?request=openImg&img=<?= $pr["immagine"]?>" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;"> 
			<div class="caption"> <h3><?= $pr["titolo"]?></h3> 
			<p><a href="#" class="btn btn-primary btn-visualizza-prodotto" data-toggle="modal" data-target="#productView"  data-id = "<?= $pr["id"] ?>" role="button">Guarda</a></p> </div> </div>
		</div>
	<?php endforeach;?>
</div>

<?php require $BASE_PATH_TEMPLATE."modal/homepage.php" ?>
