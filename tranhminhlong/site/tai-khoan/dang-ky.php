<?php

require '../../global.php';
require '../../dao/khach-hang.php';

extract($_REQUEST);
$view_name = "tai-khoan/dang-ky-form.php";


extract($_REQUEST);

if (exist_param("btn_register")) {
    if ($mat_khau != $mat_khau2) {
        $message = "Mật khẩu phải trùng nhau";
    } elseif (khach_hang_exist($ma_kh)) {
        $message = "Tên đăng nhập đã tồn tại";
    } else {

        $file_name = save_file("up_hinh", "$upload_url/users/");
        $hinh = $file_name ? $file_name : "";
        try {
            khach_hang_insert($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro);
            $message = "Đăng ký thành viên thành công!";
            $view_name = "dang-nhap-form.php";
        } catch (Exception $exc) {
            $message = "Đăng ký thành viên thất bại!";
            // }
        }
    }
} else {
    global $ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro, $mat_khau2;
    $view_name = "tai-khoan/dang-ky-form.php";
}

require '../layout.php';