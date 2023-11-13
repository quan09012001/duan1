<style>
    /* CSS cho container của thông tin nhận hàng */
.invoice-container {
    max-width: 380px;
    margin: 100px auto 0;
    padding: 20px;
    background-color: #f5f5f5;
}

/* CSS cho tiêu đề "Thông tin nhận hàng" */
.invoice-container h4 {
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
}

/* CSS cho nhãn và input */
.invoice-container label {
    display: block;
    margin-top: 10px;
}

.invoice-container input[type="text"],
.invoice-container input[type="radio"],
.invoice-container textarea {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* CSS cho nút "Xác nhận" */
.invoice-container button[name="btn_thanh_toan"] {
    background-color: #28a745;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    margin-top: 20px;
}

/* CSS cho các radio button và label của phương thức thanh toán */
.invoice-container input[type="radio"] {
    margin-right: 10px;
}

/* CSS cho Ghi chú */
.invoice-container textarea {
    height: 100px;
}

/* CSS cho div chứa nút Xác nhận */
.invoice-container .d-flex {
    display: flex;
    justify-content: center;
}

</style>
<div class="invoice-container">
    <h4>Thông tin nhận hàng</h4>
    <form action="<?= $site_url . '/cart/invoice.php' ?>" method="POST" id="invoice" enctype="multipart/form-data">
         <!-- Họ và tên -->
         <label for="">Họ và tên</label>
            <input type="text" name="ho_ten" value="<?= $ho_ten ?>"
                aria-describedby="helpId">
    

        <!-- Mã khách hàng (ẩn) -->
            <input type="hidden" name="ma_kh" value="<?= $ma_kh ?>"
                aria-describedby="helpId">
    

        <!-- Địa chỉ email -->
            <label for="">Địa chỉ email</label>
            <input type="text" name="email" value="<?= $email ?>"
                aria-describedby="helpId">
    

        <!-- Số điện thoại -->
            <label for="">Số điện thoại</label>
            <input type="text" name="sdt" placeholder=""
                aria-describedby="helpId">
    

        <!-- Địa chỉ nhận hàng -->
            <label for="">Địa chỉ nhận hàng</label>
            <input type="text" name="dia_chi" placeholder=""
                aria-describedby="helpId">
    

        <!-- Phương thức thanh toán -->
            <label for="">Phương thức thanh toán</label>
            <br>
            <input type="radio" name="phuong_thuc_tt" id="" value="0" checked placeholder=""
                aria-describedby="helpId"> Tiền mặt
            <input type="radio" name="phuong_thuc_tt" id="" value="1" placeholder=""
                aria-describedby="helpId"> Chuyển khoản ngân hàng
            <input type="radio" name="phuong_thuc_tt" id="" value="2" placeholder=""
                aria-describedby="helpId"> Ví điện tử
    

        <!-- Trạng thái (ẩn) -->
        <input type="hidden" name="trang_thai" value="0">

        <!-- Ghi chú -->
            <label for="">Ghi chú</label>
            <textarea name="ghi_chu" class="form-control" id=""></textarea>
    

        <!-- Nút Xác nhận -->
        <div class="d-flex justify-content-center">
            <button type="submit" name="btn_thanh_toan"
                class="btn btn-success btn-block pt-2 pb-2 rounded-pill">Xác nhận</button>
    </form>
</div>
