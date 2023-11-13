<?php

require '../../global.php';
require_once '../../dao/hang-hoa.php';


if (exist_param("gioi-thieu")) {
    $_SESSION['name_page'] = 'gioi_thieu';
    $view_name = "trang-chinh/gioi-thieu.php";
    //
} else if (exist_param("san-pham")) {

    $_SESSION['name_page'] = 'san_pham';
    header("location: $site_url/hang-hoa/liet-ke.php");
} else if (exist_param("bai-viet")) {

    $_SESSION['name_page'] = 'bai_viet';

    $view_name = "trang-chinh/bai-viet.php";
    //
} else if (exist_param("hoi-dap")) {
    $_SESSION['name_page'] = 'hoi_dap';
    $view_name = "trang-chinh/hoi-dap.php";
    //
} else {
    $_SESSION['name_page'] = 'trang_chu';
    $items = hang_hoa_select_dac_biet();
    $top10 = hang_hoa_select_top10();
    $view_name = "trang-chinh/trang-chu.php";
}

require '../layout.php';
