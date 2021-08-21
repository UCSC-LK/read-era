<?php
	session_unset();
	require_once  'controller/itemsController.php';		
    $controller = new itemsController();	
    $controller->mvcHandler();
?>