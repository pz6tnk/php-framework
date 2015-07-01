<?php
define('DS', DIRECTORY_SEPARATOR);

spl_autoload_register(function ($className) {
    if ( 'pz6' == substr($className,0,3) ) {
        $className = str_replace('pz6', '', $className);
        require __DIR__ . str_replace('\\', DS, $className) . '.php';
    }
    return false;
});