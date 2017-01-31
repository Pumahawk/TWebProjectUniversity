<?php

require("../bin/Framework.php");

use Framework\Framework;

Framework::loadPhpFile("../app");
Framework::loadPhpFile("../app/Controller");
Framework::loadPhpFile("../app/Model");
Framework::loadPhpFile("../app/View");

use App\Router;

Router::boot();
Router::process((isset($_GET["request"]) ? $_GET["request"] : "/"));