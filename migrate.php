<?php
 
require_once(__DIR__ . '/autoload.php');

//$db = new MySQL_DB('localhost', 'root', 'root', 'test', 'tbl_');
 
$command = new pz6\app\MigrationManager();
 
$action = isset($argv[1]) ?  ucfirst($argv[1]) : 'help';
$params = array_slice($argv, 2);
 
if (method_exists($command, $action)) {
    if ($exitCode = call_user_func_array(array($command, $action), $params)) {
        exit($exitCode);
    }
} else {
    $command->help();
    exit(1);
}
