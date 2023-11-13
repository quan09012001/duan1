<?php
require_once "../../dao/pdo.php";
require_once "../../dao/binh-luan.php";
require_once "../../dao/thong-ke.php";
require "../../global.php";

// Kiểm tra đăng nhập trước khi thực hiện các thao tác dưới đây
check_login();

// Trích xuất các tham số từ $_REQUEST
extract($_REQUEST);

if (exist_param("ma_hh")) {
    if (exist_param("btn_delete")) {
        // Xóa một bình luận theo mã bình luận
        try {
            binh_luan_delete($ma_bl);
            $message = "Xóa thành công";
        } catch (Exception $exc) {
            $message = "Xóa thất bại";
        }
    } else if (exist_param("btn_delete_all")) {
        // Xóa nhiều bình luận theo danh sách mã bình luận
        try {
            $arr_ma_bl = $_POST['ma_bl'];
            binh_luan_delete($arr_ma_bl);
            $message = "Xóa thành công!";
        } catch (Exception $exc) {
            $message = "Xóa thất bại!";
        }
        
        // Hiển thị danh sách bình luận của một sản phẩm cụ thể
        $items = binh_luan_select_by_hang_hoa($ma_hh);
        $view_name = "detail.php";
    }

    $items = binh_luan_select_by_hang_hoa($ma_hh);

    if (count($items) == 0) {
        // Nếu không có bình luận cho sản phẩm, thì hiển thị danh sách thống kê bình luận
        $items = thong_ke_binh_luan();
        $view_name = "list.php";
    } else {
        $view_name = "detail.php";
    }
} else {
    // Hiển thị danh sách thống kê bình luận nếu không có sản phẩm cụ thể
    $items = thong_ke_binh_luan();
    $view_name = "list.php";
}

// Gọi đến layout để hiển thị giao diện
require "../layout.php";
?>