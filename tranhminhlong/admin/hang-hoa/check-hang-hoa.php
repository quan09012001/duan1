<?php
require_once "../../global.php";
require "../../dao/hang-hoa.php";

if (isset($_GET['act']) && ($_GET['act'] == 'add')) {
    $result = hang_hoa_exist_add($_GET['ten_hh']);
    if ($result == true) {
        echo json_encode(false);
    } else {
        echo json_encode(true);
    }
}

if (isset($_GET['act']) && ($_GET['act'] == 'update')) {
    // Kiểm tra tính hợp lệ khi cập nhật hàng hóa
    $result = hang_hoa_exist_update($_GET['ma_hh'], $_GET['ten_hh']);
    if ($result == true) {
        echo json_encode(false);
    } else {
        echo json_encode(true);
    }
}
