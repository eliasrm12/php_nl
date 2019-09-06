<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);


include_once '../config.php';



$route = $_GET['route'] ?? '/';
var_dump( $_GET);

switch ($route) {
    case '/':
        require '../index.php';
        break;

    case '/admin':
        require '../admin/index.php';
        break;
    
    case '/admin/posts':
        require '../admin/posts.php';
        break;

    case '/admin/create':
        require '../admin/insert-post.php';
        break;

    default:
        require '../index.php';
        break;
}