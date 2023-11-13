<?php
require_once "../../global.php";
require "../../dao/loai.php";

// Kiểm tra nếu có tham số "act" trong URL
if (isset($_GET['act'])) {
    // Nếu tham số "act" là "add"
    if ($_GET['act'] == 'add') {
        // Kiểm tra sự tồn tại của loại hàng hóa dựa trên tên loại
        $result = loai_exist_ten_loai_add($_GET['ten_loai']);
        if ($result == true) {
            echo json_encode(false); // Trả về "false" nếu tồn tại
        } else {
            echo json_encode(true); // Trả về "true" nếu không tồn tại
        }
    }

    // Nếu tham số "act" là "update"
    if ($_GET['act'] == 'update') {
        // Kiểm tra sự tồn tại của loại hàng hóa dựa trên mã loại và tên loại
        $result = loai_exist_ten_loai_update($_GET['ma_loai'], $_GET['ten_loai']);
        if ($result == true) {
            echo json_encode(false); // Trả về "false" nếu tồn tại
        } else {
            echo json_encode(true); // Trả về "true" nếu không tồn tại
        }
    }
}
