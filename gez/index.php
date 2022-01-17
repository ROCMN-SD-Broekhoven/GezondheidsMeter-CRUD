<?php
session_start();
include_once ("files/includes/classloader.php");

/*if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    header("Location: /start");
}*/

$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
switch ($request_uri[0]) {
    case '':
    case '/':
    case '/home':
        require __DIR__ . '/files/views/home.php';
        break;
    case '/login':
        require __DIR__ . '/files/views/login.php';
        break;
    case '/register':
        require __DIR__ . '/files/views/register.php';
        break;
    case '/start':
        require __DIR__ . '/files/views/start.php';
        break;
    case '/daily':
        require __DIR__ . '/files/views/daily-test.php';
        break;
    case '/result':
        require __DIR__ . '/files/views/result.php';
        break;
    case '/logout':
        require __DIR__ . '/files/views/logout.php';
        break;
    default:
        header('HTTP/1.0 404 Not Found');
        require __DIR__ . '/files/views/404.php';
        break;
}