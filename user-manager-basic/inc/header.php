<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xây dựng giao diện hệ thống</title>
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <a href="" class="logo">UITOP</a>
            <div id="user-login">
                <p>Xin chào <b><?php if (is_login()){echo info_user('fullname');}  ?></b><a href="?page=logout">(Thoát)</a></p>
            </div>
            <ul class="main-menu">
                <li><a href="?page=home">Trang chủ</a></li>
                <li><a href="?page=news">News</a></li>
                <li><a href="?page=product">Sản phẩm</a></li>
                <li><a href="?page=about">About</a></li>
                <li><a href="?page=contact">Contact</a></li>
            </ul>
        </div>