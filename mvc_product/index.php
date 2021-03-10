<?php 
	ini_set("display_errors","1");
	$action = $_GET['action'];
	$controller = $_GET['controller'];

	$controllerName = $controller.'Controller';
	require_once('controllers/'.$controllerName.'.php');

	$controller = new $controllerName();
	$controller->create_db();
	$controller-> $action();

 ?>