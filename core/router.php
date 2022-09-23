<?php
session_start();
ob_start();
//Triệu gọi đến file xử lý thông qua request

$request_path = MODULESPATH . DIRECTORY_SEPARATOR . get_module() . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . get_controller() . 'Controller.php';

if (file_exists($request_path)) {
    require $request_path;
   
} else {
    echo "Không tìm thấy:$request_path ";
}

$action_name = get_action() . 'Action';

call_function(array('construct', $action_name));


// echo $action_name;
// // echo require COREPATH . DIRECTORY_SEPARATOR . 'appload.php';

if (!is_login() && $action_name != 'loginAction') {
    redirect('?mod=usermanager&action=login');
}