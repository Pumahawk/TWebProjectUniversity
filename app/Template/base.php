<?php
	$BASE_PATH_TEMPLATE = "../app/Template/";
?><html>
	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		
		<!-- Optional theme -->
		<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css" >
		
		<!-- Latest compiled and minified JavaScript -->
		<link rel="stylesheet" href="css/style.css">
		
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	</head>
	<body>
	
	    <div class="container">
	    <!-- Static navbar -->
	      <nav class="navbar navbar-default">
	
	      <?php require $BASE_PATH_TEMPLATE."navbar.php" ?>
	      
	      </nav>
	      <?php require $BASE_PATH_TEMPLATE.$this->CENTER_PAGE ?>
			<footer class="footer">
	      <?php require $BASE_PATH_TEMPLATE."footer.php" ?>
		      </footer>
	    </div> <!-- /container -->
	
	
	    <!-- Bootstrap core JavaScript
	    ================================================== -->
	    <!-- Placed at the end of the document so the pages load faster -->
	  
		<script src="js/jquery.min.js" ></script>
		<script src="bootstrap/js/bootstrap.min.js" ></script>
		<script src="js/function_support.js" ></script>

	</body>
</html>