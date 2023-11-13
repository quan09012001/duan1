<style>
    /* CSS cho tiêu đề "Giỏ hàng" */
h4 {
    font-size: 24px;
    color: #333; /* Màu chữ đen */
    margin-bottom: 20px;
}

/* CSS cho bảng danh sách sản phẩm */
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table th, table td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: center;
}

table th {
    background-color: #f5f5f5; /* Màu nền xám nhạt cho hàng tiêu đề */
}

/* CSS cho ô chứa số tiền và nút thanh toán */
table td:last-child {
    text-align: left;
}

/* CSS cho nút "Thanh toán" và nút "Xóa tất cả" */
table th:last-child,
table th:nth-last-child(2) {
    text-align: center;
}

table th:last-child a,
table th:nth-last-child(2) a {
    display: inline-block;
    padding: 5px 10px;
    margin: 0 10px;
    background-color: #007bff; /* Màu nền xanh dương cho nút */
    color: #fff; /* Màu chữ trắng */
    text-decoration: none;
    border-radius: 5px;
}

table th:last-child a:hover,
table th:nth-last-child(2) a:hover {
    background-color: #0056b3; /* Màu nền xanh dương đậm khi di chuột qua nút */
}

/* CSS cho hàng sản phẩm */
table tbody tr {
    background-color: #fff; /* Màu nền trắng cho hàng sản phẩm */
}

/* CSS cho nút "Xoá" */
table td:last-child a {
    color: red; /* Màu chữ đỏ cho nút "Xoá" */
}

/* CSS cho thông báo "Không tồn tại sản phẩm nào trong giỏ hàng" */
h6 {
    font-size: 18px;
    color: #333; /* Màu chữ đen */
    margin-bottom: 20px;
}

/* CSS cho liên kết "Về trang chủ" */
a {
    color: #007bff; /* Màu chữ xanh dương cho liên kết */
    text-decoration: none;
}

a:hover {
    text-decoration: underline; /* Gạch chân khi di chuột qua liên kết */
}

</style>
<?php
$totalDonGia = 0;
$totalGiamGia = 0;
$totalThanhTien = 0;
?>
<h4>Giỏ hàng</h4>

<?php if (isset($_SESSION['cart'])) { ?>
    <table>
        <thead>
            <tr>
                <th>Mã SP</th>
                <th>Tên SP</th>
                <th>Đơn giá</th>
                <th>Giảm giá</th>
                <th style="width:6rem">Số lượng</th>
                <th>Thành tiền</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <?php foreach ($_SESSION['cart'] as $index => $item) : ?>
            <tr>
                <td><?= $index ?></td>
                <td><?= $item['ten_hh'] ?></td>
                <td>
                    <span><?= number_format($item['don_gia'], 0, ".") ?></span> đ
                    <input type="hidden" name="don_gia" value="<?= $item['don_gia'] ?>">
                </td>
                <td>
                    <span><?= number_format($item['giam_gia'], 0, ".") ?></span> đ
                    <input type="hidden" name="giam_gia" value="<?= $item['giam_gia'] ?>">
                </td>
                <td>
                    <form action="delete-cart.php?act=update_sl" method="post">
                        <input type="number" name="update_sl" onchange="this.form.submit()" value="<?= $item['sl'] ?>" min="1" max="10">
                        <input type="hidden" name="ma_hh" value="<?= $index ?>">
                    </form>
                </td>
                <td>
                <?php
                    $don_gia = $item['don_gia'];
                    $giam_gia = $item['giam_gia'];
                    $sl = $item['sl'];
                    $thanh_tien = ($don_gia - $giam_gia) * $sl;
                    echo '<span>' . number_format($thanh_tien, 0, ".") . '</span> đ';
                    $totalThanhTien += $thanh_tien;
                    $totalDonGia += $don_gia;
                    $totalGiamGia += $giam_gia;
                    ?>
                </td>
                <th>
                    <a onclick="return confirm('Bạn chắc chắn muốn xóa ?');" href="<?= $site_url . "/cart/delete-cart.php?act=delete&id=" . $index ?>">
                        Xoá
                    </a>
                </th>
            </tr>
        <?php endforeach ?>
        <tr>
            <th colspan="2">Tổng cộng</th>
            <td><span><?= number_format($totalDonGia, 0, ".") ?></span> đ</td>
            <td><span><?= number_format($totalGiamGia, 0, ".") ?></span> đ</td>
            <td></td>
            <th>
            <a href="<?= $site_url . "/cart/list-cart.php?form_invoice" ?>">Thanh toán <span><?= number_format($totalThanhTien, 0, ".") ?></span> đ</a></th>
            <th>
                <a onclick="return confirm('Bạn chắc chắn muốn xóa tất cả chứ?');" href="<?= $site_url . "/cart/delete-cart.php?act=deleteAll" ?>">Xóa tất cả</a>
            </th>
        </tr>
    </table>
<?php } else { ?>
    <h6>Không tồn tại sản phẩm nào trong giỏ hàng</h6>
    <a href="<?= $root_url ?>"> Về trang chủ</a>
<?php } ?>