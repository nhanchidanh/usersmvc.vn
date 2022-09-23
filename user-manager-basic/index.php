<?php
session_start();
ob_start();
require 'data/users.php';
require 'lib/user.php';
require 'lib/function.php';
if(isset($_COOKIE['is_login'])){
}

// if(!isset($_SESSION['is_login'])){
//     header('Location:login.php');
// }else 
//     header('Location:index.php');
?>


<?php
$page = !empty($_GET['page']) ? $_GET['page'] : 'home';
// $page = $_GET['page'];
$path = "pages/{$page}.php";

// Kiểm tra login
if(!is_login() && $page != 'login'){
    redirect('?page=login');
}


if (file_exists($path)) {
    require $path;
} else require 'inc/404.php';
?>


