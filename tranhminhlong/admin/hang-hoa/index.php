<?php
require_once "../../dao/pdo.php";
require_once "../../dao/loai.php";
require_once "../../dao/hang-hoa.php";
require "../../global.php";

check_login();

extract($_REQUEST);
if (exist_param("btn_list")) {
    // Hiển thị danh sách hàng hóa
    $items = hang_hoa_select_page('ma_hh', 10);
    $view_name = "list.php";
} else if (exist_param("btn_insert")) {
    // Xử lý khi người dùng thêm mới hàng hóa
    $ten_hh = $_POST['ten_hh'];
    $don_gia = $_POST['don_gia'];
    $giam_gia = $_POST['giam_gia'];
    $ma_loai = $_POST['ma_loai'];
    $dac_biet = $_POST['dac_biet'];
    $so_luot_xem = $_POST['so_luot_xem'];
    $mo_ta = $_POST['mo_ta'];
    $ngay_nhap = $_POST['ngay_nhap'];

    $hinh = save_file('hinh', "$upload_url/products/");

    // Insert dữ liệu vào CSDL
    hang_hoa_insert($ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta);

    // Hiển thị danh sách hàng hóa sau khi thêm
    $items = hang_hoa_select_page('ma_hh', 10);
    $view_name = "list.php";
} else if (exist_param("btn_edit")) {
    // Lấy thông tin hàng hóa để chỉnh sửa
    $ma_hh = $_REQUEST['ma_hh'];
    $hang_hoa_info = hang_hoa_select_by_id($ma_hh);
    extract($hang_hoa_info);

    $loai_hang = loai_select_all('ASC');
    $view_name = "edit.php";
} else if (exist_param("btn_delete")) {
    // Xóa hàng hóa
    $ma_hh = $_REQUEST['ma_hh'];
    hang_hoa_delete($ma_hh);

    // Hiển thị danh sách hàng hóa sau khi xóa
    $items = hang_hoa_select_page('ma_hh', 10);
    $view_name = "list.php";
} else if (exist_param("btn_delete_all")) {
    try {
        // Xóa nhiều hàng hóa cùng lúc
        $arr_ma_hh = $_POST['ma_hh'];
        hang_hoa_delete($arr_ma_hh);
        $message = "Xóa thành công!";
    } catch (Exception $exc) {
        $message = "Xóa thất bại!";
    }
    $items = hang_hoa_select_page('ma_hh', 10);
    $view_name = "list.php";
} else if (exist_param("btn_update")) {
    // Cập nhật thông tin hàng hóa
    $ten_hh = $_POST['ten_hh'];
    $don_gia = $_POST['don_gia'];
    $giam_gia = $_POST['giam_gia'];
    $ma_loai = $_POST['ma_loai'];
    $dac_biet = $_POST['dac_biet'];
    $so_luot_xem = $_POST['so_luot_xem'];
    $mo_ta = $_POST['mo_ta'];
    $ngay_nhap = $_POST['ngay_nhap'];

    $up_hinh = save_file("up_hinh", "$upload_url/products/");
    $hinh = strlen($up_hinh) > 0 ? $up_hinh : $hinh;

    // Cập nhật thông tin hàng hóa trong CSDL
    hang_hoa_update($ma_hh, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta);

    // Hiển thị danh sách hàng hóa sau khi cập nhật
    $items = hang_hoa_select_page('ma_hh', 10);
    $view_name = "list.php";
} else {
    $loai_hang = loai_select_all('ASC');
    $view_name = "add.php";
}
require "../layout.php";
?>