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
<h4>Thống kê hàng hoá từng loại</h4>
<input type="button" value="Xóa các mục đã chọn">
<table width="100%">
    <thead>
        <tr>
            <th>LOẠI HÀNG</th>
            <th>SỐ LƯỢNG</th>
            <th>GIÁ CAO NHẤT</th>
            <th>GIÁ THẤP NHẤT</th>
            <th>GIÁ TRUNG BÌNH</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($items as $item) {
            extract($item);
        ?>
            <tr>
                <td><?= $ten_loai ?></td>
                <td><?= $so_luong ?></td>
                <td>$<?= number_format($gia_min, 2) ?></td>
                <td>$<?= number_format($gia_max, 2) ?></td>
                <td>$<?= number_format($gia_avg, 2) ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<a href="index.php?chart">Xem biểu đồ</a>