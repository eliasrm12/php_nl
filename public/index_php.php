<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);


include_once '../config.php';



$route = $_GET['route'] ?? '/';
var_dump( $_GET);

switch ($route) {
    case '/':
        require './index.html';
        break;

    case '/gallery':
        require './views/gallery.html';
        break;
    
    case '/blog':
        require './views/blog.html';
        break;

    case '/admin/create':
        require '../admin/insert-post.php';
        break;

    default:
        require './index.html';
        break;
}