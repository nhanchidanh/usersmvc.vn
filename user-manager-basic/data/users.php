<?php 
    # Mảng dữ liệu user
    /* Thông tin user:
    Họ và tên => fullname
    Tên đăng nhặp => username
    Mật khẩu => password
    Email => email
    Id => id */

    $list_users = array(
        1 => array(
            'id' => 1,
            'fullname' => 'Phan Trần Trung Trực',
            'username' => 'truc1234',
            'password' => md5('truc12345'),
            'email' => 'truc@gmail.com',
        ),
        2 => array(
            'id' => 2,
            'fullname' => 'Phan Kiên',
            'username' => 'kien1234',
            'password' => md5('kien!@#'),
            'email' => 'kien@gmail.com',
        ),
        3 => array(
            'id' => 3,
            'fullname' => 'Nguyên Thị Yến Vy',
            'username' => 'yenvy1234',
            'password' => md5('yenvy!@#'),
            'email' => 'yenvy@gmail.com',
        ),
    );
