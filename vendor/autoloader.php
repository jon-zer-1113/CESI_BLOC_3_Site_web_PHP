<?php
spl_autoload_register(function ($class) {
    $file = lcfirst(str_replace('\\', '/', $class)) . '.php';
    if (file_exists($file)) {
        require_once $file;
    } else {
        exit("The file {$file} could not be found ☹️!");
    }
});

