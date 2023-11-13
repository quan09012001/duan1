<?php
require_once 'pdo.php';

// Hàm thêm một khách hàng mới vào cơ sở dữ liệu
function khach_hang_insert($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro)
{
    $sql = "INSERT INTO khach_hang(ma_kh,mat_khau,ho_ten,email,hinh,kich_hoat,vai_tro) VALUES(?,?,?,?,?,?,?)";
    pdo_execute($sql, $ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat == 1, $vai_tro == 1);
}

// Hàm cập nhật thông tin khách hàng
function khach_hang_update($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro)
{
    $sql = "UPDATE khach_hang SET mat_khau=?,ho_ten=?,email=?,hinh=?,kich_hoat=?,vai_tro=? WHERE ma_kh=?";
    pdo_execute($sql, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat == 1, $vai_tro == 1, $ma_kh);
}

// Hàm xóa khách hàng
function khach_hang_delete($ma_kh)
{
    $sql = "DELETE FROM khach_hang WHERE ma_kh=?";
    if (is_array($ma_kh)) {
        foreach ($ma_kh as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $ma_kh);
    }
}

// Hàm lấy tất cả khách hàng
function khach_hang_select_all()
{
    $sql = "SELECT * FROM khach_hang";
    return pdo_query($sql);
}

// Hàm lấy thông tin khách hàng dựa trên mã khách hàng
function khach_hang_select_by_id($ma_kh)
{
    $sql = "SELECT * FROM khach_hang WHERE ma_kh=?";
    return pdo_query_one($sql, $ma_kh);
}

// Hàm kiểm tra sự tồn tại của khách hàng dựa trên mã khách hàng
function khach_hang_exist($ma_kh)
{
    $sql = "SELECT count(*) FROM khach_hang WHERE ma_kh=?";
    return pdo_query_value($sql, $ma_kh) > 0;
}

// Hàm kiểm tra sự tồn tại của khách hàng dựa trên địa chỉ email
function khach_hang_exist_email($email)
{
    $sql = "SELECT count(*) FROM khach_hang WHERE email=?";
    return pdo_query_value($sql, $email) > 0;
}

// Hàm thay đổi mật khẩu của khách hàng
function khach_hang_change_password($ma_kh, $mat_khau_moi)
{
    $sql = "UPDATE khach_hang SET mat_khau=? WHERE ma_kh=?";
    pdo_execute($sql, $mat_khau_moi, $ma_kh);
}
