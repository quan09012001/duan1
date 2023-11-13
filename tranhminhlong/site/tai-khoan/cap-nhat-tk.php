<?php
require '../../global.php';
require '../../dao/khach-hang.php';

check_login();

extract($_REQUEST);

if (exist_param("btn_update")) {
    $file_name = save_file("up_hinh", "$upload_url/users/");
    $hinh = $file_name ? $file_name : $hinh;
    try {
        khach_hang_update($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro);
        $message = "Cập nhật thành công!";
        $_SESSION['user'] = khach_hang_select_by_id($ma_kh);
    } catch (Exception $exc) {
        $message = "Cập nhật thất bại!";
    }
} else {
    extract($_SESSION['user']);
}

$view_name = "tai-khoan/cap-nhat-tk-form.php";
require '../layout.php';
?>
