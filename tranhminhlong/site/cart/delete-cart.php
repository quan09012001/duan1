<?php
require '../../global.php';
extract($_REQUEST);

// Kiểm tra nếu giỏ hàng trống
if (empty($_SESSION['cart'])) {
    header("location:" . $site_url . "/cart/list-cart.php");
} else {
    // Kiểm tra hoạt động được chỉ định (act)
    if ($act == "deleteAll") {
        // Xóa toàn bộ giỏ hàng và tổng sản phẩm
        unset($_SESSION['cart']);
        unset($_SESSION['total_cart']);
        header("location:" . $site_url . "/cart/list-cart.php");
    } else if ($act == "delete") {
        // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
        if (array_key_exists($id, $_SESSION['cart'])) {
            // Giảm tổng số sản phẩm theo số lượng sản phẩm bị xóa
            $_SESSION['total_cart'] -= $_SESSION['cart'][$id]['sl'];
            unset($_SESSION['cart'][$id]);
            header("location:" . $site_url . "/cart/list-cart.php");
        }
    } else if ($act == "update_sl") {
        // Cập nhật số lượng sản phẩm trong giỏ hàng
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($key == $_POST['ma_hh']) {
                $_SESSION['cart'][$key]['sl'] = $_POST['update_sl'];
            }
        }
        header("location:" . $site_url . "/cart/list-cart.php");
    } else {
        header("location:" . $site_url . "/cart/list-cart.php");
    }
}
?>