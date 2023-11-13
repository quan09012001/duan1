<?php
require_once "../../global.php";
require_once "../../dao/thong-ke.php";

check_login();


if (exist_param("chart")) {
    $view_name = "chart.php";
} else {
    $view_name = "list.php";
}
$items = thong_ke_hang_hoa();
require "../layout.php";