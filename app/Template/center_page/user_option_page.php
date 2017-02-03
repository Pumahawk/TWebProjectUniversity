<h1>Impostazioni utente</h1>

<p>
<form id = "modificaUtenteForm">
<div class = "row "><div class = "col-md-6 col-md-offset-3">
  <div class="form-group">
    <label for="exampleInputEmail1">Nome</label>
    <input type="text" class="form-control" id="nome" value = "<?= $_SESSION["utente"]["nome"]?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Cognome</label>
    <input type="text" class="form-control" id="cognome" value = "<?= $_SESSION["utente"]["cognome"]?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="email" class="form-control" id="email" value = "<?= $_SESSION["utente"]["email"]?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Indirizzo</label>
    <input type="text" class="form-control" id="indirizzo" value = "<?= $_SESSION["utente"]["indirizzo"]?>">
  </div>
  <div class="alert alert-danger" id = "errorMessage" role="alert" hidden="true">...</div>
  <button type = "submit"class="btn btn-default">Salva</button>
</div></div>
<p>
</form>