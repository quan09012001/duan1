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
<h4>Thêm danh mục</h4>
<form action="index.php" method="POST" id="add_loai">
    <label for="ma_loai">Mã loại</label>
    <input type="text" name="ma_loai" disabled value="Tự động">
    <label for="ten_loai">Tên loại</label>
    <input type="text" name="ten_loai" required>
    <input type="reset" value="Nhập lại">
    <input type="submit" name="btn_insert" value="Thêm mới">
    <a href="index.php?btn_list"><input type="button" value="Danh sách"></a>
</form>