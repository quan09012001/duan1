<style>
    /* CSS cho tiêu đề "Chi tiết bình luận" */
h4 {
    font-size: 24px;
    color: #333; /* Màu chữ đen */
}

/* CSS cho nút "Xóa mục đã chọn" */
#deleteAll {
    background-color: #ff0000; /* Màu nền đỏ cho nút */
    color: #fff; /* Màu chữ trắng */
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

/* CSS cho table */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
}

/* CSS cho table header */
table th {
    background-color: #f5f5f5; /* Màu nền xám nhạt cho hàng tiêu đề */
    text-align: center;
}

/* CSS cho table header checkbox */
table th input[type="checkbox"] {
    margin: 0;
}

/* CSS cho table body */
table td {
    border: 1px solid #ccc;
    text-align: center;
    padding: 10px;
}

/* CSS cho table body checkbox */
table td input[type="checkbox"] {
    margin: 0;
}

/* CSS cho nội dung bình luận */
table td:nth-child(3) {
    text-align: left; /* Căn trái nội dung bình luận */
}

/* CSS cho nút "Xoá bình luận" */
table td a {
    color: #007bff; /* Màu chữ xanh dương cho liên kết */
    text-decoration: none;
}

table td a:hover {
    text-decoration: underline; /* Gạch chân khi di chuột qua liên kết */
}

/* CSS cho phân trang */
ul {
    list-style: none;
    padding: 0;
}

ul li {
    display: inline-block;
    margin-right: 10px;
}

ul li a {
    color: #007bff; /* Màu chữ xanh dương cho liên kết phân trang */
    text-decoration: none;
}

ul li a:hover {
    text-decoration: underline; /* Gạch chân khi di chuột qua liên kết phân trang */
}

/* CSS cho liên kết "Quay lại" */
a {
    color: #007bff; /* Màu chữ xanh dương cho liên kết */
    text-decoration: none;
}

a:hover {
    text-decoration: underline; /* Gạch chân khi di chuột qua liên kết */
}

</style>
<h4>Danh sách hàng hóa</h4>
<?php
if (isset($message) && (strlen($message) > 0)) {
    echo '<h5>' . $message . '</h5>';
}
?>
<form action="?btn_delete_all" method="post">
    <button type="submit" id="deleteAll" onclick="return checkDelete()">
        Xóa mục đã chọn</button>
    <table>
        <thead>
            <tr>
                <th><input type="checkbox" id="select-all"></th>
                <th>Mã HH</th>
                <th>Tên hàng hóa</th>
                <th>Ảnh</th>
                <th>Đơn giá</th>
                <th>Giảm giá</th>
                <th>Lượt xem</th>
                <th>Ngày nhập</th>
                <th>Đặc biệt?</th>
                <th><a href="index.php">Thêm mới
                    </a></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($items as $item) {
                extract($item);
                $suahh = "index.php?btn_edit&ma_hh=" . $ma_hh;
                $xoahh = "index.php?btn_delete&ma_hh=" . $ma_hh;
                $img_path = $upload_url . '/products/' . $hinh;
                if (is_file($img_path)) {
                    $img = "<img src='$img_path' height='60' width='60'";
                } else {
                    $img = "Chưa có ảnh";
                }
                //Tính giảm giá bằng bao nhiêu phần trăm
                if ($don_gia > 0) {
                    $percent_discount = number_format($giam_gia / $don_gia * 100);
                }
            ?>
                <tr>
                    <td><input type="checkbox" name="ma_hh[]" value="<?= $ma_hh ?>"></td>
                    <td><?= $ma_hh ?></td>
                    <td><?= $ten_hh ?></td>
                    <td><?= $img ?></td>
                    <td><?= number_format($don_gia, 0) ?>đ</td>
                    <td><?= number_format($giam_gia, 0) ?>đ
                        <i>(<?= isset($percent_discount) ? $percent_discount : '' ?>%)</i>
                    </td>
                    <td><?= $so_luot_xem ?></td>
                    <td><?= $ngay_nhap ?></td>
                    <td><?= ($dac_biet == 1) ? "Đặc biệt" : "Không"; ?></td>

                    <td>
                        <a href="<?= $suahh ?>">Sửa</a>
                        <a href="<?= $xoahh ?>" onclick="return checkDelete()">Xoá</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <ul>
        <?php for ($i = 1; $i <= $_SESSION['total_page']; $i++) { ?>
            <li>
                <a></a>
            </li>
        <?php } ?>
    </ul>
</form>