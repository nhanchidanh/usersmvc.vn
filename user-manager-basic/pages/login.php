<?php
ob_start();
require 'lib/validation.php';

if (isset($_POST['btn_login'])) {
    $error = array();
    // username
    if (empty($_POST['username'])) {
        $error['username'] = "Vui lòng không để trống";
    } else {
        if (!is_username($_POST['username'])) {
            $error['username'] = "Vui lòng nhập đúng định dạng";
        } else {
            $username = $_POST['username'];
        }
    }
    // password
    if (empty($_POST['password'])) {
        $error['password'] = "Vui lòng không để trống";
    } else {
        if (!is_password($_POST['password'])) {
            $error['password'] = "Vui lòng viết hoa chữ cái đầu";
        } else {
            $password = $_POST['password'];
        }
    }
    //Kết luận
    if (empty($error)) {
        if (check_login($username, $password)) {
            if(isset($_POST['remember_me'])){
                setcookie('is_login', true, time() + 3600);
                setcookie('user_login', "{$username}", time() + 3600);
            }
            // Lưu trữ phiên đăng nhập
            $_SESSION['is_login'] = true;
            $_SESSION['user_login'] = $username;
            // chuyển hướng vào trong hệ thống
           redirect("?page=home");
        } else {
            $error['account'] = "HAHAHAHAHAHAHAHA";
        }
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/login.css">
</head>

<body>
    <div class="wrapper-login">
        <div id="login_">
            <h1>Đăng nhập</h1>
            <form action="" method="post">
                <input type="text" name="username" id="username" placeholder="Tên đăng nhập" value="<?php echo set_value('username'); ?>">
                <?php echo form_error('username'); ?>
                <input type="password" name="password" id="password" placeholder="Mật khẩu">
                <?php echo form_error('password'); ?>
                <input type="submit" name="btn_login" id="login" value="Đăng nhập">
                <?php echo form_error('account'); ?>
                <label for="remember">Ghi nhớ đăng nhập</label>
                <input type="checkbox" name="remember_me" id="remember">
            </form>
            <a href="">Quên mật khẩu?</a>
        </div>

    </div>
</body>

</html>