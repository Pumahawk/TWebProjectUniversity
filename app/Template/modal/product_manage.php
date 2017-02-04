<!-- Modal -->
<div class="modal fade" id="newProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
<form enctype="multipart/form-data" action = "?request=manageProducts" id = "newProductForm" method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Crea prodotto</h4>
      </div>
      <div class="modal-body">

<p>
<div class = "row ">
<div class = "col-md-6 col-md-offset-3">
  <div class="form-group">
    <label for="exampleInputEmail1">Titolo</label>
    <input type="text" class="form-control" name="titolo" >
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Prezzo</label>
    <input type="number" class="form-control" name="prezzo" >
  </div>
  <div class="form-group">
    <label for="exampleInputFile">Carica fotot</label>
    <input type="file" id="" name = "foto">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Descrizione</label>
    <textarea class="form-control" name="descrizione" ></textarea>
  </div>
  <div class="alert alert-danger" id = "errorMessage" role="alert" hidden="true">...</div>
</div></div>
<p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Aggiungi</button>
      </div>
    </div></form>
  </div>
</div>
<div class="modal fade" id="productView" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="titleProduct">titleProduct</h4>
      </div>
      <div class="modal-body" id = "productDescription">
      <div class = "text-center" id = "img">img</div>
      <h4>Descrizione:</h4>
      <div id = "description">description</div>
      <hr>
      <strong>Prezzo: </strong><span id = "price">price</span> &euro;
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->