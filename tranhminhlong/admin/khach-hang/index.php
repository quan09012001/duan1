<?php
require_once "../../dao/pdo.php";
require_once "../../dao/khach-hang.php";
require "../../global.php";
check_login();

extract($_REQUEST);

// Nếu nút "Danh sách" được bấm
if (exist_param("btn_list")) {

    // Hiển thị dữ liệu
    $items = khach_hang_select_all();
    $view_name = "list.php";
} 
// Nếu nút "Thêm mới" được bấm
else if (exist_param("btn_insert")) {
    #lấy dữ liệu từ form
    $ma_kh = $_POST['ma_kh'];
    $ho_ten = $_POST['ho_ten'];
    $mat_khau = $_POST['mat_khau'];
    $email = $_POST['email'];
    $kich_hoat = $_POST['kich_hoat'];
    $vai_tro = $_POST['vai_tro'];

    // Upload file lên host
    $hinh = save_file('hinh', "$upload_url/users");

    // Insert vào cơ sở dữ liệu
    khach_hang_insert($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro);

    // Hiển thị dữ liệu
    $items = khach_hang_select_all();
    $view_name = "list.php";
} 
// Nếu nút "Sửa" được bấm
else if (exist_param("btn_edit")) {
    #lấy dữ liệu từ form
    $ma_kh = $_REQUEST['ma_kh'];
    $khach_hang_info = khach_hang_select_by_id($ma_kh);
    extract($khach_hang_info);

    // Hiển thị dữ liệu
    $items = khach_hang_select_all();
    $view_name = "edit.php";
} 
// Nếu nút "Xóa" được bấm
else if (exist_param("btn_delete")) {

    $ma_kh = $_REQUEST['ma_kh'];
    khach_hang_delete($ma_kh);

    // Hiển thị danh sách

    $items = khach_hang_select_all();
    $view_name = "list.php";
} 
// Nếu nút "Xóa tất cả" được bấm
else if (exist_param("btn_delete_all")) {
    try {
        $arr_ma_kh = $_POST['ma_kh'];
        khach_hang_delete($arr_ma_kh);
        $MESSAGE = "Xóa thành công!";
    } catch (Exception $exc) {
        $MESSAGE = "Xóa thất bại!";
    }
    $items = khach_hang_select_all();
    $view_name = "list.php";
} 
// Nếu nút "Cập nhật" được bấm
else if (exist_param("btn_update")) {

    $ma_kh = $_POST['ma_kh'];
    $ho_ten = $_POST['ho_ten'];
    $mat_khau = $_POST['mat_khau'];
    $email = $_POST['email'];
    $kich_hoat = $_POST['kich_hoat'];
    $vai_tro = $_POST['vai_tro'];

    // Upload hình lên và cập nhật đường dẫn hình mới
    $up_hinh = save_file("up_hinh", "$upload_url/users/");
    $hinh = strlen($up_hinh) > 0 ? $up_hinh : $hinh;

    // Cập nhật thông tin khách hàng
    khach_hang_update($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro);

    // Hiển thị danh sách
    $items = khach_hang_select_all();
    $view_name = "list.php";
} 
// Nếu không có nút nào được bấm, mặc định là "Thêm mới"
else {
    $view_name = "add.php";
}
require "../layout.php";
