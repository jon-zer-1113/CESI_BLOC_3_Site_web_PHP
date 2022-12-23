<?php
// The autoloader loads class files automatically 
spl_autoload_register(function ($class) {
    $file = lcfirst(str_replace('\\', '/', $class)) . '.php';
    if (file_exists($file)) {
        require_once $file;
    } else {
        exit("Le fichier {$class}.php n'a pas pu être trouvé ☹️!");
    }
});

