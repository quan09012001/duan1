<?php
require_once 'pdo.php';

// Hàm thống kê thông tin về số lượng hàng hóa, giá thấp nhất, giá cao nhất và giá trung bình theo từng loại hàng hóa
function thong_ke_hang_hoa()
{
    $sql = "SELECT lo.ma_loai, lo.ten_loai,"
        . " COUNT(*) so_luong,"
        . " MIN(hh.don_gia) gia_min,"
        . " MAX(hh.don_gia) gia_max,"
        . " AVG(hh.don_gia) gia_avg"
        . " FROM hang_hoa hh "
        . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
        . " GROUP BY lo.ma_loai, lo.ten_loai";
    return pdo_query($sql);
}

// Hàm thống kê thông tin về số lượng bình luận, ngày cũ nhất và ngày mới nhất cho từng sản phẩm
function thong_ke_binh_luan()
{
    $sql = "SELECT hh.ma_hh, hh.ten_hh,"
        . " COUNT(*) so_luong,"
        . " MIN(bl.ngay_bl) cu_nhat,"
        . " MAX(bl.ngay_bl) moi_nhat"
        . " FROM binh_luan bl "
        . " JOIN hang_hoa hh ON hh.ma_hh=bl.ma_hh "
        . " GROUP BY hh.ma_hh, hh.ten_hh"
        . " HAVING so_luong > 0";
    return pdo_query($sql);
}
