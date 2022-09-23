<?php

defined('APPPATH') or exit('Không được quyền truy cập phần này');

// get Controller name
function get_controller()
{
    global $config;
    $controller = isset($_GET['controller']) ? $_GET['controller'] : $config['default_controller'];
    return $controller;
}

// get Module name

function get_module()
{
    global $config;
    $module = isset($_GET['mod']) ? $_GET['mod'] : $config['default_module'];
    return $module;
}

//get Action name
function get_action()
{
    global $config;
    $action = isset($_GET['action']) ? $_GET['action'] : $config['default_action'];
    return $action;
}

/*
 * -------------------------------
 * Load
 * ------------------------------------------------------------------------------------
 * Load các file từ các phân vùng vào hệ thống tham gia xử lý
 * Ví dụ: load('lib','database');
 * ------------------------------------------------------------------------------------
 * GIẢI THÍCH
 * ------------------------------------------------------------------------------------
 * Đầu vào
 * - $type: Loại phân vùng hệ thống: lib, helper...
 * - $name: Tên chức năng được load: database, string...
 * ------------------------------------------------------------------------------------
 */

//function run_module($url, $data_echo = true) {
////    global $config;
//    include  base_url().$url;
////    if (empty($url))
////        return FALSE;
////
////    if ($data_echo) {
////        echo get_data($url);
////    } else {
////        return get_data($url);
////    }
//}


// user 


// $list_users = array(
//     1 => array(
//         'id' => 1,
//         'fullname' => 'Phan Trần Trung Trực',
//         'username' => 'truc1234',
//         'password' => md5('truc12345'),
//         'email' => 'truc@gmail.com',
//     ),
//     2 => array(
//         'id' => 2,
//         'fullname' => 'Phan Kiên',
//         'username' => 'kien1234',
//         'password' => md5('kien!@#'),
//         'email' => 'kien@gmail.com',
//     ),
//     3 => array(
//         'id' => 3,
//         'fullname' => 'Nguyên Thị Yến Vy',
//         'username' => 'yenvy1234',
//         'password' => md5('yenvy!@#'),
//         'email' => 'yenvy@gmail.com',
//     ),
// );



function load($type, $name)
{
    if ($type == 'lib')
        $path = LIBPATH . DIRECTORY_SEPARATOR . "{$name}.php";
    if ($type == 'helper')
        $path = HELPERPATH . DIRECTORY_SEPARATOR . "{$name}.php";
    if ($type == 'data')
        $path = DATAPATH . DIRECTORY_SEPARATOR . "{$name}.php";
    if (file_exists($path)) {
        require "$path";
    } else {
        echo "{$type}:{$name} không tồn tại";
    }
}

/*
 * -----------------------------
 * callFunction
 * -----------------------------
 * Gọi đến hàm theo tham số biến
 */

function call_function($list_function = array())
{
    if (is_array($list_function)) {
        foreach ($list_function as $f) {
            if (function_exists($f())) {
                $f();
            }
        }
    }
}

function load_view($name, $data_send = array())
{
    global $data;
    $data = $data_send;
    $path = MODULESPATH . DIRECTORY_SEPARATOR . get_module() . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $name . 'View.php';
    if (file_exists($path)) {
        if (is_array($data)) {
            foreach ($data as $key_data => $v_data) {
                $$key_data = $v_data;
            }
        }
        require $path;
    } else {
        echo "Không tìm thấy {$path}";
    }
}

function load_model($name)
{
    $path = MODULESPATH . DIRECTORY_SEPARATOR . get_module() . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . $name . 'Model.php';
    if (file_exists($path)) {
        require $path;
    } else {
        echo "Không tìm thấy {$path}";
    }
}

function get_header($name = '')
{
    global $data;
    if (empty($name)) {
        $name = 'header';
    } else {
        $name = "header-{$name}";
    }
    $path = LAYOUTPATH . DIRECTORY_SEPARATOR . $name . '.php';
    if (file_exists($path)) {
        if (is_array($data)) {
            foreach ($data as $key => $a) {
                $$key = $a;
            }
        }
        require $path;
    } else {
        echo "Không tìm thấy {$path}";
    }
}

function get_footer($name = '')
{
    global $data;
    if (empty($name)) {
        $name = 'footer';
    } else {
        $name = "footer-{$name}";
    }
    $path = LAYOUTPATH . DIRECTORY_SEPARATOR . $name . '.php';
    if (file_exists($path)) {
        if (is_array($data)) {
            foreach ($data as $key => $a) {
                $$key = $a;
            }
        }
        require $path;
    } else {
        echo "Không tìm thấy {$path}";
    }
}

function get_sidebar($name = '')
{
    global $data;
    if (empty($name)) {
        $name = 'sidebar';
    } else {
        $name = "sidebar-{$name}";
    }
    $path = LAYOUTPATH . DIRECTORY_SEPARATOR . $name . '.php';
    if (file_exists($path)) {
        if (is_array($data)) {
            foreach ($data as $key => $a) {
                $$key = $a;
            }
        }
        require $path;
    } else {
        echo "Không tìm thấy {$path}";
    }
}

function get_template_part($name)
{
    global $data;
    if (empty($name))
        return FALSE;
    $path = LAYOUTPATH . DIRECTORY_SEPARATOR . "template-{$name}.php";
    if (file_exists($path)) {
        foreach ($data as $key => $a) {
            $$key = $a;
        }
        require $path;
    } else {
        echo "Không tìm thấy {$path}";
    }
}

function check_login($username, $password)
{
    // load('lib', 'users');
    // load('data', 'users');
    global  $list_users;
    // echo $list_users;

    foreach ($list_users as $user) {
        if ($username == $user['username'] && md5($password)  == $user['password'])
            return true;
    }
    return false;
}

// Trả về true nếu đã login
function is_login()
{
    if (isset($_SESSION['is_login']))
        return true;
    return false;
}

// Trả về username của người login
function user_login()
{
    if (!empty($_SESSION['user_login']))
        return $_SESSION['user_login'];
    return false;
}

function info_user($field = 'id')
{
    // load('data', 'users');
    global $list_users;
    if (isset($_SESSION['is_login'])) {
        foreach ($list_users as $user) {
            if ($_SESSION['user_login'] == $user['username']) {
                if (array_key_exists($field, $user)) {
                    return $user[$field];
                }
            }
        }
    }
    return false;
}


function redirect($url = '?page=home')
{
    if (!empty($url)) {
        header("Location: {$url}");
    }
}


// Validation form
function iS_username($username)
{
    $partten = "/^[A-Za-z0-9_\.]{6,32}$/";
    if (!preg_match($partten, $username, $matchs))
        return false;
    return true;
}

function iS_password($password)
{
    $partten = "/^([a-z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
    if (!preg_match($partten, $password, $matchs))
        return false;
    return true;
}

function form_error($label_field)
{
    global $error;
    if (isset($error[$label_field]))
        echo "<p class='error'> {$error[$label_field]}</p>";
}

function set_value($label_field)
{
    global $$label_field;
    if (isset($$label_field))
        return $$label_field;
}

function is_email($email)
{
    $parttern = "/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
    if (!preg_match($parttern, $email))
        return false;
    return true;
}
function is_phone_number($number)
{
    $parttern = "/^(09|08|01[2|6|8|9])+([0-9]{8})$/";
    if (!preg_match($parttern, $number, $matchs))
        return false;
    return true;
}

function is_fullname($fullname)
{
    $parttern = "/^[A-Za-z]{6,40}$/";
    if (!preg_match($parttern, $fullname, $matchs))
        return false;
    return true;
}
