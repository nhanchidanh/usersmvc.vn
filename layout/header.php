<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xây dựng giao diện hệ thống</title>
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="public/js/customs.js" type="text/javascript"></script>
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <a href="" class="logo">UITOP</a>
            <div id="user-login">
                <p>Xin chào <b><?php
                                if (is_login()) {
                                    echo info_user('fullname');
                                    // echo info_user();
                                }
                                ?></b><a href="?mod=logout">(Thoát)</a></p>
            </div>
            <ul class="main-menu">
                <li><a href="?">Trang chủ</a></li>
                <li><a href="?mod=users&controller=index">Thành viên</a></li>
            </ul>
        </div>
        <div class="content">