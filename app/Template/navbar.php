        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href=".">TWCommerce</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#" data-target="#cartView" data-toggle="modal"><span class="glyphicon glyphicon-shopping-cart " aria-hidden="true"></span><span class="badge" id = "counterCart">0</span></a></li>
              
              <?php if(isset($_SESSION["utente"])):?>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $_SESSION["utente"]["email"] ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="?request=manageOrders">Visualizza ordini</a></li>
                  <?php if($_SESSION["utente"]["tipo"] == "admin"):?>
                  <li role="separator" class="divider"></li>
                  <li><a href="?request=manageProducts">Gestione prodotti</a></li>
                  <?php endif;?>
                  <li role="separator" class="divider"></li>
                  <li><a href="?request=optionProfile">Impostazioni profilo</a></li>
                  <li><a href="?request=logOut">Logout</a></li>
                </ul>
              </li>
              <?php else:?>
              <li><a href="#" data-target="#login" data-toggle="modal">Login</a></li>
              <?php endif;?>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
        
        
<?php require $BASE_PATH_TEMPLATE."modal/navbar.php" ?>