<?php

spl_autoload_register(function (string $classname) {
    $classmap = [
        'BigPhoneStore' => __DIR__ . '/',
    ];
    $parts = explode('\\', $classname);

    $namespace = array_shift($parts);
    $classFile = array_pop($parts) . '.php';

    if (!array_key_exists($namespace, $classmap)) {
        return;
    }

    $path = implode(DIRECTORY_SEPARATOR, $parts);
    $file = $classmap[$namespace] . $path . DIRECTORY_SEPARATOR . $classFile;

    if (!file_exists($file) && !class_exists($classname)) {
        return;
    }

    require_once $file;
});
