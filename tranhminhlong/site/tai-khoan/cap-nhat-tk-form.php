<style>
    /* CSS cho tiêu đề "Cập nhật tài khoản" */
h5 {
    font-size: 18px;
    color: #333; /* Màu chữ đen */
    margin-bottom: 20px;
}

/* CSS cho hình ảnh đại diện */
.img {
    max-width: 5%;
    height: auto;
    border: 1px solid #ccc; /* Đường viền với màu xám nhạt */
    border-radius: 5px;
    margin-bottom: 20px;
}

/* CSS cho nhãn và input */
label {
    display: block; /* Hiển thị nhãn trên một dòng riêng biệt */
    margin-top: 10px;
}

input[type="text"],
input[type="file"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc; /* Đường viền với màu xám nhạt */
    border-radius: 5px;
}

/* CSS cho thẻ <i> chứa thông báo */
i {
    display: block;
    color: red; /* Màu chữ đỏ */
    margin-top: 10px;
}

/* CSS cho nút "Cập nhật" */
button[name="btn_update"] {
    background-color: #007bff; /* Màu nền xanh dương */
    color: #fff; /* Màu chữ trắng */
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    margin-top: 20px;
    cursor: pointer;
}

</style>

<h5>Cập nhật tài khoản</h5>
<img class="img" src="<?= $upload_url . '/users/' . $hinh ?>" alt="Ảnh đại diện">
<form action="<?= $site_url . '/tai-khoan/cap-nhat-tk.php' ?>" method="POST" enctype="multipart/form-data">
    <label for="ma_kh">Tên đăng nhập</label>
    <input type="text" name="ma_kh" id="ma_kh" value="<?= $ma_kh ?>" readonly>
    <label for="ho_ten">Họ và tên</label>
    <input type="text" name="ho_ten" id="ho_ten" value="<?= $ho_ten ?>">
    <label for="email">Địa chỉ email</label>
    <input type="text" name="email" id="email" value="<?= $email ?>">
    <label for="up_hinh">Ảnh đại diện</label>
    <input type="file" name="up_hinh" id="up_hinh">
    <i><?= (isset($message) && (strlen($message) > 0)) ? $message : "" ?></i>
    <input name="vai_tro" value="<?= $vai_tro ?>" type="hidden">
    <input name="kich_hoat" value="<?= $kich_hoat ?>" type="hidden">
    <input name="mat_khau" value="<?= $mat_khau ?>" type="hidden">
    <input name="hinh" value="<?= $hinh ?>" type="hidden">
    <button type="submit" name="btn_update">Cập nhật</button>
</form>
