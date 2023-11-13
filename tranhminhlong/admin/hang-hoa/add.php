<style>
/* CSS cho tiêu đề "Thêm hàng hoá mới" */
h4 {
    font-size: 24px;
    color: #333; /* Màu chữ đen */
}

/* CSS cho biểu mẫu */
form {
    max-width: 600px; /* Độ rộng tối đa của biểu mẫu */
    margin: 0 auto; /* Canh giữa biểu mẫu */
    padding: 20px; /* Khoảng cách nội dung với khung viền */
    border: 1px solid #ccc; /* Khung viền rõ ràng */
    border-radius: 5px;
}

/* CSS cho nhãn (label) */
label {
    display: block; /* Để nhãn hiển thị trên một dòng riêng biệt */
    margin-top: 10px; /* Khoảng cách phía trên nhãn */
}

/* CSS cho input và select */
input[type="text"],
input[type="number"],
input[type="file"],
select,
textarea {
    width: 100%; /* Độ rộng 100% để điền vào toàn bộ vùng chứa */
    padding: 10px; /* Khoảng cách lề bên trong input/select/textarea */
    margin-top: 5px; /* Khoảng cách phía trên input/select/textarea */
    border: 1px solid #ccc; /* Khung viền */
    border-radius: 5px;
}

/* CSS cho radio buttons */
input[type="radio"] {
    margin-right: 5px; /* Khoảng cách giữa radio buttons và nhãn */
}

/* CSS cho nút "Nhập lại" và "Thêm mới" */
input[type="reset"],
input[type="submit"] {
    background-color: #007bff; /* Màu nền xanh dương cho nút */
    color: #fff; /* Màu chữ trắng */
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px; /* Khoảng cách phía trên nút */
}

/* CSS cho nút "Danh sách" */
a input[type="button"] {
    background-color: #333; /* Màu nền xám cho nút "Danh sách" */
    color: #fff; /* Màu chữ trắng */
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px; /* Khoảng cách phía trên nút */
    text-decoration: none; /* Loại bỏ gạch chân */
    display: inline-block; /* Hiển thị trên cùng một dòng */
}

/* CSS cho textarea */
textarea {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* CSS cho input[type="file"] */
input[type="file"] {
    padding: 5px;
}

/* CSS cho ngày nhập */
input[type="date"] {
    padding: 5px;
}


</style>
<h4>Thêm hàng hoá mới</h4>
<form action="index.php" method="POST" enctype="multipart/form-data" id="add_hang_hoa">
    <label for="ma_loai">Loại hàng</label>
    <select name="ma_loai" id="ma_loai">
        <?php
        foreach ($loai_hang as $loai_hang) {
            extract($loai_hang);
            echo '<option value="' . $ma_loai . '">' . $ten_loai . '</option>';
        }
        ?>
    </select>
    <label for="ten_hh">Tên hàng hóa</label>
    <input type="text" name="ten_hh" id="ten_hh">
    <label for="ma_hh">Mã hàng hóa</label>
    <input type="text" name="ma_hh" id="ma_hh" readonly value="Tự động">
    <label for="hinh">Ảnh sản phẩm</label>
    <input type="file" name="hinh" id="hinh">
    <label for="don_gia">Đơn giá (vnđ)</label>
    <input type="number" name="don_gia" id="don_gia">
    <label for="giam_gia">Giảm giá (vnđ)</label>
    <input type="number" name="giam_gia" id="giam_gia">
    <label>Hàng đặc biệt?</label>
    <input type="radio" value="1" name="dac_biet" id="dac_biet">
    <label for="dac_biet">Đặc biệt</label>
    <input type="radio" value="0" name="dac_biet" id="binh_thuong" checked>
    <label for="binh_thuong">Bình thường</label>
    <?php $today = date_format(date_create(), 'Y-m-d'); ?>
    <label for="ngay_nhap">Ngày nhập</label>
    <input type="date" name="ngay_nhap" id="ngay_nhap" value="<?= $today ?>">
    <label for="so_luot_xem">Số lượt xem</label>
    <input type="text" name="so_luot_xem" id="so_luot_xem" readonly value="0">
    <label for="mo_ta">Mô tả sản phẩm</label>
    <textarea id="txtarea" spellcheck="false" name="mo_ta" id="textareaExample" rows="3"></textarea>
    <input type="reset" value="Nhập lại">
    <input type="submit" name="btn_insert" value="Thêm mới">
    <a href="index.php?btn_list"><input type="button" value="Danh sách"></a>
</form>