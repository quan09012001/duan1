<?php
require '../../global.php';
require '../../dao/khach-hang.php';
check_login();
extract($_REQUEST);
if (exist_param('btn_change')) {
    if ($mat_khau2 != $mat_khau3) {
        $message = "Xác nhận mật khẩu mới không đúng";
    } else {
        $user = khach_hang_select_by_id($ma_kh);
        if ($user) {
            if ($user['mat_khau'] == $mat_khau) {
                try {
                    khach_hang_change_password($ma_kh, $mat_khau2);
                    $message = 'Cập nhật mật khẩu thành công';
                } catch (Exception $exc) {
                    $message = 'Thất bại';
                }
            } else {
                $message = 'Mật khẩu cũ không đúng';
            }
        } else {
            $message = "Sai mã đăng nhập";
        }
    }
}
$view_name = 'tai-khoan/doi-mk-form.php';
require '../layout.php';