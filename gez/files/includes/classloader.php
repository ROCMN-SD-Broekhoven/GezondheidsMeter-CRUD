<?php
//spl_autoload_register(function ($className) {
//    $rootDir = dirname($_SERVER["DOCUMENT_ROOT"])."/files/";
//    $path = $rootDir."classes/";
//    $ext = ".php";
//
//    $fullpath = $path.$className.$ext;
//
//    if (!file_exists($fullpath)) {
//        echo $fullpath;
//        return false;
//    }
//
//    include $fullpath;
//});



spl_autoload_register(function ($className) {
    $source = $_SERVER['DOCUMENT_ROOT'];
    $dirs = [
        $source.'/files/classes/'
    ];
    $ext = ".php";

    foreach ($dirs as $directory) {
        if (file_exists($directory.$className.$ext)) {
            require ($directory.$className.$ext);
        }
    }
});