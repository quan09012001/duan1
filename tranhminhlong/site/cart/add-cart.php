<?php
require '../../global.php';
require '../../dao/hang-hoa.php';

extract($_REQUEST);

// Kiểm tra nếu có id và id lớn hơn 0
if (isset($id) && $id > 0) {
    $items = hang_hoa_select_by_id($id);
    $total = 0;
    extract($items);

    // Kiểm tra nếu có phiên giỏ hàng
    if (isset($_SESSION['cart'])) {
        // Kiểm tra nếu sản phẩm đã có trong giỏ hàng
        if (isset($_SESSION['cart'][$id]['sl'])) {
            $_SESSION['cart'][$id]['sl'] += 1;
        } else {
            $_SESSION['cart'][$id]['sl'] = 1;
        }
        $_SESSION['cart'][$id]['ten_hh'] = $ten_hh;
        $_SESSION['cart'][$id]['don_gia'] = $don_gia;
        $_SESSION['cart'][$id]['giam_gia'] = $giam_gia;

        // Tính tổng số sản phẩm trong giỏ hàng
        foreach ($_SESSION['cart'] as $key => $value) {
            $total += $_SESSION['cart'][$key]['sl'];
        }
        echo $total;
    } else {
        // Nếu giỏ hàng không tồn tại, tạo một sản phẩm mới trong giỏ hàng
        $_SESSION['cart'][$id]['sl'] = 1;
        $_SESSION['cart'][$id]['ten_hh'] = $ten_hh;
        $_SESSION['cart'][$id]['don_gia'] = $don_gia;
        $_SESSION['cart'][$id]['giam_gia'] = $giam_gia;

        // Tính tổng số sản phẩm trong giỏ hàng
        foreach ($_SESSION['cart'] as $key => $value) {
            $total += $_SESSION['cart'][$key]['sl'];
        }
        echo $total;
    }

    // Lưu tổng số sản phẩm trong giỏ hàng vào biến phiên "total_cart"
    $_SESSION['total_cart'] = $total;

    // Chuyển hướng đến trang giỏ hàng
    header("location:" . $site_url . "/cart/list-cart.php");
}
?>