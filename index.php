<?php
/**
 * pz6-framework
 *
 * Front controller
 */

require_once(__DIR__ . '/autoload.php');

$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'Article';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';

$controllerClassName = $ctrl . 'Controller';
require_once('controllers/' . $controllerClassName . '.php');

$controller = new $controllerClassName();
$method = 'action' . $act;
$controller->$method();