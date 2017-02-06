<div class="modal fade" id="cartView" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="titleProduct">Carrello</h4>
      </div>
      <div class="modal-body" id = "listProductCart">
      	 <div class="list-group text-center">
      	 <?php
      	 if(isset($_SESSION["cart"])):
	      	 $i = 0; $price = 0;foreach($_SESSION["cart"] as $product):?>
			  <a class="list-group-item" data-toggle="collapse" data-target="#collapseExample<?= $i?>"><strong><?=$product["titolo"]?></strong><br><span class = "priceProduct"><?=$product["prezzo"]?></span> &euro;</a>
			  <div class="collapse" id="collapseExample<?= $i++?>">
				  <div class="well">
				    <button class = "btn btn-default removeFromCart" data-id = "<?= $product["id"]?>" >Rimuovi</button>
				  </div>
			  </div>
			  <?php 
			  $price += $product["prezzo"];
			  endforeach;
		  endif;?>
		</div>
		<?php if(isset($_SESSION["cart"])):?>
		  <hr>
		  Prezzo: <strong id = "totalPrice"><?=$price?></strong> &euro;
		  <?php endif;?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Torna ai prodotti</button>
        <button type="button" class="btn btn-primary" id = "byCartButton">Compra</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
<form id = "loginForm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Login</h4>
      </div>
      <div class="modal-body">

<p>
<div class = "row ">
<div class = "col-md-6 col-md-offset-3">
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" id="email" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="password">
  </div>
  <div class="alert alert-danger" id = "errorMessage" role="alert" hidden="true">...</div>
</div></div>
<p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href = "?request=registrationPage"><button type="button" class="btn btn-default"  data-toggle="modal">Registrati</button></a>
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </div></form>
  </div>
</div>