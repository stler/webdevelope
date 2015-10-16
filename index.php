<?php
	namespace src\core\classes;
    include_once('src/core/classes/FrontController.php');
    include_once('src/core/classes/Request.php');
 //   include_once('src/core/classes//Routing.php');
    include_once('src/core/classes/Config.php');

	$front = new FrontController();
	$front->bootstrapt()->hahdlerRequest();
?>