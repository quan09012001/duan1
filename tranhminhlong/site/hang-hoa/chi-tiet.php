<?php
require '../../global.php';
require '../../dao/hang-hoa.php';
require '../../dao/binh-luan.php';

//-------------------------------//
extract($_REQUEST);

// Truy vấn mặt hàng theo mã để hiển thị
$hang_hoa = hang_hoa_select_by_id($ma_hh);
extract($hang_hoa);

// Tăng số lượt xem lên 1
hang_hoa_tang_so_luot_xem($ma_hh);

// Hàng cùng loại
$hh_cung_loai = hang_hoa_select_by_loai($ma_loai);

// Xử lý bình luận
if (exist_param("noi_dung")) {
    $ma_kh = $_SESSION['user']['ma_kh'];
    $ngay_bl = date_format(date_create(), 'Y-m-d');
    binh_luan_insert($ma_kh, $ma_hh, $noi_dung, $ngay_bl, $rating);
}

// Lấy danh sách bình luận
$binh_luan_list = binh_luan_select_by_hang_hoa($ma_hh, 5);

$view_name = "hang-hoa/chi-tiet-ui.php";
require '../layout.php';
