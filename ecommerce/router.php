<?php
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'product';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

require_once 'controllers/' . ucfirst($controller) . 'Controller.php';

$controllerClass = ucfirst($controller) . 'Controller';
$controllerInstance = new $controllerClass();
$controllerInstance->$action();
?>
