<style>
    /* Áp dụng CSS cho phần gói bọc (container) */
div[style="max-width: 500px;"] {
    max-width: 500px;
    margin: 0 auto; /* Căn giữa đối tượng trong container */
    padding: 20px;
    background-color: #f5f5f5; /* Màu nền xám nhạt */
}

/* CSS cho tiêu đề "Đăng ký" */
h4 {
    font-size: 24px;
    color: #333; /* Màu chữ đen */
    margin-bottom: 20px;
}

/* CSS cho các nhãn và input */
label {
    display: block; /* Hiển thị nhãn trên một dòng riêng biệt */
    margin-top: 10px;
}

input[type="text"],
input[type="email"],
input[type="password"],
input[type="file"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc; /* Đường viền với màu xám nhạt */
    border-radius: 5px;
}

/* CSS cho thẻ <small> */
small {
    display: block;
    font-size: 12px;
    color: #888; /* Màu chữ xám nhạt */
    margin-top: 5px;
}

/* CSS cho nút Đăng ký */
button[name="btn_register"] {
    background-color: #007bff; /* Màu nền xanh dương */
    color: #fff; /* Màu chữ trắng */
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    margin-top: 20px;
    cursor: pointer;
}

/* CSS cho thẻ <i> chứa thông báo */
i {
    display: block;
    color: red; /* Màu chữ đỏ */
    margin-top: 10px;
}

/* CSS cho đường kẻ ngang (hr) */
hr {
    border: 1px solid #ccc;
    margin: 20px 0;
}

/* CSS cho liên kết "Đăng nhập" */
p a {
    color: #007bff; /* Màu chữ xanh dương */
    text-decoration: none;
}

p a:hover {
    text-decoration: underline; /* Gạch chân khi di chuột qua liên kết */
}

</style>
<div style="max-width: 500px;">
    <article>
            <h4>Đăng ký</h4>

        <!-- FORM -->
        <form action="<?= $site_url ?>/tai-khoan/dang-ky.php" method="post" enctype="multipart/form-data" id="form_dang_ki">

            <label for="ho_ten">Họ và tên</label>
            <input type="text" id="ho_ten" placeholder="Họ tên" name="ho_ten">


            <label for="ma_kh">Tên đăng nhập</label>
            <input type="text" id="ma_kh" placeholder="Tên đăng nhập" name="ma_kh">


            <label for="email">Email</label>
            <input type="email" id="email" placeholder="Nhập địa chỉ email..." name="email">
            <small>Chúng tôi sẽ không bao giờ chia sẻ email của bạn với bất kỳ ai khác.</small>


            <label for="up_hinh">Ảnh đại diện</label>
            <input type="file" id="up_hinh" name="up_hinh">



            <label for="mat_khau">Tạo mật khẩu</label>
            <input type="password" id="mat_khau" name="mat_khau">




            <label for="mat_khau2">Nhập lại mật khẩu</label>
            <input type="password" id="mat_khau2" name="mat_khau2">


            <i><?= $message ?></i>

            <button type="submit" name="btn_register"> Đăng ký </button>

            <input type="hidden" name="kich_hoat" value="1">
            <input type="hidden" name="vai_tro" value="0">
            <i><?= (isset($message) && (strlen($message) > 0)) ? $message : "" ?></i>
        </form>
        <hr>
        <p>Đã có tài khoản? <a href="<?= $site_url ?>/tai-khoan/dang-nhap.php">Đăng nhập</a></p>
    </article>