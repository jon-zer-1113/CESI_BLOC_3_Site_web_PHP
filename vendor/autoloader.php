<?php

/**
 * Autoloader
 * Registers an autoloader function that includes the necessary class files.
 * Converts the namespace and class name to a file path and checks if the file exists.
 * If found, includes the file. Otherwise, throws an error message.
 *
 * @param string $class The fully qualified class name
 * @return void
 */

spl_autoload_register(function ($class) {
    // Convert namespace and class name to a file path
    $file = lcfirst(str_replace('\\', '/', $class)) . '.php';
    if (file_exists($file)) {
        require_once $file;
    } else {
        exit("The file {$file} could not be found ☹️!");
    }
});
