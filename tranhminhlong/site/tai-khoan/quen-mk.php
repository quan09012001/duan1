<?php

require '../../global.php';
require '../../dao/khach-hang.php';

extract($_REQUEST);
$view_name = 'tai-khoan/quen-mk-form.php';
if (exist_param('btn_forgot_pass')) {
    # code...
    $user = khach_hang_select_by_id($ma_kh);
    if ($user) {
        if ($user['email'] != $email) {
            $message = 'Sai email đăng nhập';
        } else {
            $message = "Mật khẩu của bạn là :" . $user['mat_khau'];
            global $ma_kh, $mat_khau;
            $view_name = 'tai-khoan/dang-nhap-form.php';
        }
    } else {
        $message = 'Sai tên đăng nhập';
    }
}

require '../layout.php';