<?php
// Bao gồm các tệp và thư viện cần thiết
require '../../global.php';
require '../../dao/hang-hoa.php';
require '../../dao/loai.php';

// Trích xuất thông tin từ yêu cầu HTTP (request)
extract($_REQUEST);

if (exist_param("ma_loai")) {
    // Nếu có tham số 'ma_loai', tìm sản phẩm thuộc loại đó
    $name_loai = loai_select_by_id($ma_loai);
    extract($name_loai);
    $title_site = "Các sản phẩm thuộc loại: '$ten_loai'";
    $items = hang_hoa_select_by_loai($ma_loai);
} else if (exist_param("dac_biet")) {
    // Nếu có tham số 'dac_biet', tìm sản phẩm đặc biệt
    $title_site = "Sản phẩm đặc biệt";
    $items = hang_hoa_select_dac_biet();
} else if (exist_param("timkiem")) {
    // Nếu có tham số 'timkiem', tìm sản phẩm dựa trên từ khóa
    $kyw = $_POST['kyw'];
    if ($kyw == '') {
        $title_site = "Tất cả sản phẩm";
    } else {
        $title_site = "Các sản phẩm có chứa từ khóa: '$kyw'";
    }
    $items = hang_hoa_select_keyword($kyw);
    if (count($items) == 0) {
        $title_site = "Không có sản phẩm nào chứa từ khóa: '$kyw'";
    }
} else {
    // Trường hợp mặc định, hiển thị tất cả sản phẩm
    $title_site = "Tất cả sản phẩm";
    $items = hang_hoa_select_page('so_luot_xem', 12);
}

$hh_db = hang_hoa_select_dac_biet();
$hh_top10 = hang_hoa_select_top10();
$ds_loai = loai_select_all();
$view_name = "hang-hoa/liet-ke-ui.php";

// Bao gồm giao diện chung (layout)
require '../layout.php';
