<?php
require_once "../../dao/pdo.php";
require_once "../../dao/loai.php";
require "../../global.php";
check_login();

extract($_REQUEST);

if (exist_param("btn_list")) {
    // Hiển thị danh sách
    $items = loai_select_all();
    $view_name = "list.php";
} elseif (exist_param("btn_insert")) {
    // Lấy dữ liệu từ form và thêm vào CSDL
    loai_insert($ten_loai);

    // Hiển thị danh sách sau khi thêm mới
    $items = loai_select_all();
    $view_name = "list.php";
} elseif (exist_param("btn_edit")) {
    // Lấy thông tin loại sản phẩm để chỉnh sửa
    $ma_loai = $_REQUEST['ma_loai'];
    $loai_info = loai_select_by_id($ma_loai);
    extract($loai_info);

    // Hiển thị danh sách và biểu mẫu chỉnh sửa
    $items = loai_select_all();
    $view_name = "edit.php";
} elseif (exist_param("btn_delete")) {
    // Xóa loại sản phẩm
    $ma_loai = $_REQUEST['ma_loai'];
    loai_delete($ma_loai);

    // Hiển thị danh sách sau khi xóa
    $items = loai_select_all();
    $view_name = "list.php";
} elseif (exist_param("btn_delete_all")) {
    try {
        // Xóa nhiều loại sản phẩm cùng lúc
        $arr_ma_loai = $_POST['ma_loai'];
        loai_delete($arr_ma_loai);
        $message = "Xóa thành công!";
    } catch (Exception $exc) {
        $message = "Xóa thất bại!";
    }

    // Hiển thị danh sách sau khi xóa
    $items = loai_select_all();
    $view_name = "list.php";
} elseif (exist_param("btn_update")) {
    // Lấy thông tin loại sản phẩm cần cập nhật
    $ma_loai = $_POST['ma_loai'];
    $ten_loai = $_POST['ten_loai'];

    // Cập nhật loại sản phẩm
    loai_update($ma_loai, $ten_loai);

    // Hiển thị danh sách sau khi cập nhật
    $items = loai_select_all();
    $view_name = "list.php";
} else {
    // Hiển thị biểu mẫu thêm mới
    $view_name = "add.php";
}

require "../layout.php";
?>