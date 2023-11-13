<style>
        /* CSS cho tiêu đề "Đăng nhập" */
h4 {
    font-size: 24px;
    color: #333; /* Màu chữ đen */
    margin-bottom: 20px;
    margin-left: 20%;
}

/* CSS cho nhãn và input */
label {
    display: block; /* Hiển thị nhãn trên một dòng riêng biệt */
    margin-top: 10px;
}

form{
        width: 50%;
        margin-left: 20%;
}

input[type="text"],
input[type="password"] {
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


/* CSS cho mục "Ghi nhớ tài khoản" */
label input[type="checkbox"] {
    margin-right: 5px;
}

/* CSS cho nút "Đăng nhập" */
button[name="btn_login"] {
    background-color: #007bff; /* Màu nền xanh dương */
    color: #fff; /* Màu chữ trắng */
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    margin-top: 20px;
    cursor: pointer;
}

/* CSS cho mục "Bạn chưa có tài khoản?" */
p a {
    color: #007bff; /* Màu chữ xanh dương */
    text-decoration: none;
}

p a:hover {
    text-decoration: underline; /* Gạch chân khi di chuột qua liên kết */
}

</style>
<h4>Đăng nhập</h4>
<form action="<?= $site_url ?>/tai-khoan/dang-nhap.php" method="POST" id="form_login">
    
        <label for="email">Tài khoản</label>
        <input name="ma_kh" placeholder="Username" type="text" value="<?= $ma_kh ?>">
    
    
        <label for="password">Mật khẩu</label>
        <input name="mat_khau" placeholder="Password" type="password" value="<?= $mat_khau ?>">
        <i><?= $message ?></i>
    

    
        <a href="<?= $site_url ?>/tai-khoan/quen-mk.php">Quên mật khẩu?</a>

        <label> <input type="checkbox" name="ghi_nho" checked>
             Ghi nhớ tài khoản 
        </label>
    

    
        <button type="submit" name="btn_login"> Đăng nhập </button>
    <p >Bạn chưa có tài khoản? <a href="<?= $site_url ?>/tai-khoan/dang-ky.php">Đăng ký</a></p>
<br><br>
</form>



