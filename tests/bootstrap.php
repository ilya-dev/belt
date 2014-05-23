<?php
date_default_timezone_set('UTC');

$vendor = realpath(__DIR__ . '/../vendor');

if (file_exists($vendor . "/autoload.php")) {
    require $vendor . "/autoload.php";
} else {
    $vendor = realpath(__DIR__ . '/../../../');
    if (file_exists($vendor . "/autoload.php")) {
        require $vendor . "/autoload.php";
    } else {
        throw new Exception("Unable to load dependencies");
    }
}

spl_autoload_register(function ($class) {
    $class = ltrim($class, '\\');
    $prefix = 'Belt\\Tests';
    if (strpos($class, $prefix) === 0) {
        $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
        $class = 'Belt' . DIRECTORY_SEPARATOR . 'Tests' . DIRECTORY_SEPARATOR . '_includes' . substr($class, strlen($prefix));
        $file = __DIR__ . DIRECTORY_SEPARATOR . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
        }
    }
});

define('FILES', __DIR__ . "/Belt/Tests/_files");

require_once __DIR__ . "/../src/Belt/Autoloader.php";
Belt\Autoloader::register();