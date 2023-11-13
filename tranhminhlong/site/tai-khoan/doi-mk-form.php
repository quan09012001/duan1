<style>
    /* CSS cho phần gói bọc (container) */
div[style="max-width: 380px; margin-top:100px;"] {
    max-width: 380px;
    margin: 100px auto 0; /* Canh giữa đối tượng trong container và đặt margin-top thành 100px */
    padding: 20px;
    background-color: #f5f5f5; /* Màu nền xám nhạt */
}

/* CSS cho tiêu đề "Đổi mật khẩu" */
h4 {
    font-size: 24px;
    color: #333; /* Màu chữ đen */
    margin-bottom: 20px;
}

/* CSS cho nhãn và input */
label {
    display: block; /* Hiển thị nhãn trên một dòng riêng biệt */
    margin-top: 10px;
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

/* CSS cho nút "Đổi mật khẩu" */
button[name="btn_change"] {
    background-color: #007bff; /* Màu nền xanh dương */
    color: #fff; /* Màu chữ trắng */
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    margin-top: 20px;
    cursor: pointer;
}

/* CSS cho liên kết "Đăng ký" */
p a {
    color: #007bff; /* Màu chữ xanh dương */
    text-decoration: none;
}

p a:hover {
    text-decoration: underline; /* Gạch chân khi di chuột qua liên kết */
}

</style>
<div style="max-width: 380px; margin-top:100px;">
    
        <h4>Đổi mật khẩu</h4>
        <form action="<?= $site_url ?>/tai-khoan/doi-mk.php" method="POST" id="form_doi_mk">
            
                <label for="email">Tài khoản(tên đăng nhập)</label>
                <input name="ma_kh" placeholder="Username" readonly type="text"
                    value="<?= $_SESSION['user']['ma_kh'] ?>">
            
            
                <label for="password">Mật khẩu cũ</label>
                <input name="mat_khau" placeholder="Username" type="password">
            
            
                <label for="password">Mật khẩu mới</label>
                <input name="mat_khau2" placeholder="Username" type="password" id="mat_khau2">
            
            
                <label for="password">Xác nhân mật khẩu mới</label>
                <input name="mat_khau3" placeholder="Username" type="password">
            
            <i><?= (isset($message) && (strlen($message) > 0)) ? $message : "" ?></i>
            
                <button type="submit" name="btn_change"> Đổi mật khẩu </button>
            
        </form>
    


<p>Bạn chưa có tài khoản? <a href="<?= $site_url ?>/tai-khoan/dang-ky.php">Đăng ký</a></p>
<br><br>
