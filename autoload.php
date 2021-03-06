<?php
define('DS', DIRECTORY_SEPARATOR);

if (!is_readable(__DIR__ . DS . 'vendor')) {
    die('Install composer dependencies first!');
}

require realpath(__DIR__ . DS . 'vendor' . DS . 'autoload.php');

spl_autoload_register(function ($className) {
    if ( 'pz6' == substr($className,0,3) ) {
        $className = str_replace('pz6', '', $className);
        $filePath = __DIR__ . str_replace('\\', DS, $className) . '.php';
        if(file_exists($filePath)) {
            require $filePath;
        }
    }
    return false;
});
