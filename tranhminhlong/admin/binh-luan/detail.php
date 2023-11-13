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
<h4>Chi tiết bình luận</h4>
                <form action="?btn_delete_all" method="post">
                    <button type="submit" id="deleteAll" onclick="return checkDelete()">
                        Xóa mục đã chọn
                    </button>
                    <i>Hàng hóa: <b><?= $items[0]['ten_hh'] ?></b></i>
                    <table width="100%">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="select-all"></th>
                                <th>Đánh giá</th>
                                <th>Nội dung</th>
                                <th>Ngày bình luận</th>
                                <th>Người bình luận</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($items as $item) {
                                extract($item);
                            ?>
                            <tr>
                                <td><input type="checkbox" name="ma_bl[]" value="<?= $ma_bl ?>"></td>
                                <td><?= $rating ?> sao</td>
                                <td><?= $noi_dung ?></td>
                                <td><?= $ngay_bl ?></td>
                                <td><?= $ma_kh ?></td>
                                <td>
                                    <a href="index.php?btn_delete&ma_bl=<?= $ma_bl ?>&ma_hh=<?= $ma_hh ?>"
                                        onclick="return checkDelete()">
                                        Xoá bình luận
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <input type="hidden" name="ma_hh" value="<?= $ma_hh ?>">
                    <div width="100%">
                        <ul>
                            <?php for ($i = 1; $i <= $_SESSION['total_page']; $i++) { ?>
                            <li>
                                <a href="?ma_hh=<?= $ma_hh ?>&page=<?= $i ?>"><?= $i ?></a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <a href="index.php">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
