<?php
// Import các tệp và thư viện cần thiết
require '../../global.php';
require '../../dao/hang-hoa.php';
require '../../dao/khach-hang.php';

// Trích xuất thông tin từ request
extract($_REQUEST);

// Kiểm tra nếu người dùng yêu cầu truy cập trang "form_invoice"
if (exist_param("form_invoice")) {
    // Kiểm tra xem người dùng đã đăng nhập hay chưa
    if (isset($_SESSION['user'])) {
        // Lấy thông tin khách hàng từ phiên đăng nhập
        $id = $_SESSION['user'];
        $kh = khach_hang_select_by_id($id['ma_kh']);
        extract($kh);
        // Hiển thị trang "form-invoice.php" để người dùng nhập thông tin thanh toán
        $view_name = "../cart/form_invoice.php";
    } else {
        // Nếu người dùng chưa đăng nhập, chuyển hướng họ đến trang đăng nhập "dang-nhap.php"
        header("location:" . $site_url . "/tai-khoan/dang-nhap.php");
    }
} else {
    // Nếu không có yêu cầu truy cập trang "form_invoice," hiển thị trang "cart.php" cho người dùng
    $view_name = "../cart/cart.php";
}

// Gọi đến layout để hiển thị trang web
require '../layout.php';
?>
