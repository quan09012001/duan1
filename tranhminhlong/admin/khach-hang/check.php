<?php
require '../../global.php';
require '../../dao/khach-hang.php';

// Kiểm tra sự tồn tại của mã khách hàng được gửi qua tham số GET
if (isset($_GET['ma_kh'])) {
    $result = khach_hang_exist($_GET['ma_kh']);
    if ($result == true) {
        echo json_encode(false); // Trả về 'false' nếu mã khách hàng tồn tại
    } else {
        echo json_encode(true); // Trả về 'true' nếu mã khách hàng không tồn tại
    }
}

// Kiểm tra sự tồn tại của địa chỉ email được gửi qua tham số GET
if (isset($_GET['email'])) {
    $result = khach_hang_exist_email($_GET['email']);
    if ($result == true) {
        echo json_encode(false); // Trả về 'false' nếu địa chỉ email tồn tại
    } else {
        echo json_encode(true); // Trả về 'true' nếu địa chỉ email không tồn tại
    }
}

// Kiểm tra sự tồn tại của mã khách hàng được gửi qua phương thức POST
if (isset($_POST['ma_kh'])) {
    $result = khach_hang_exist($_POST['ma_kh']);
    if ($result == true) {
        echo json_encode(true); // Trả về 'true' nếu mã khách hàng tồn tại
    } else {
        echo json_encode(false); // Trả về 'false' nếu mã khách hàng không tồn tại
    }
}
?>