<?php
// bắt đầu phiên làm việc
session_start();

/* các url cần thiết trong web */
 
$root_url = "/tranhminhlong";
$content_url = "$root_url/content";
$admin_url = "$root_url/admin";
$site_url = "$root_url/site";
$sl_per_page = 10;

// đường dẫn chứa ảnh upload

$upload_url = "../../uploaded";

$view_name = "index.php";
$message = "";

$title = 'Tranh Minh Long';
$address_ad = '116 Nguyễn Huy Tưởng - Liên Chiểu - Đà Nẵng';
$contact_ad = '0326357293';
$emailress_ad= 'nhq.it.vn@gmail.com';
$youtube_address_ad = 'youtube.com/nguyenhongqquanofficial';
$bottom_footer = 'Code by Minh Long Picture ©2023';
$maps = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.254829235128!2d108.16610517490368!3d16.052260784624814!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142196d9a203685%3A0x4e8027fe58d65525!2zQ2FvIMSR4bqzbmcgRlBUIEPGoSBT4bufIDI!5e0!3m2!1svi!2s!4v1698474298596!5m2!1svi!2s" width="300" height="200" style="border:0; padding-top: 10%; grid-area: maps;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';

// kiểm tra sự tồn tại của biến trong $_REQUEST
/* $_REQUEST trong PHP lưu trữ dữ liệu từ yêu cầu HTTP, bao gồm dữ liệu biểu mẫu và tham số truy vấn. */

function exist_param($fileldname){
    return array_key_exists($fileldname, $_REQUEST);
}

// lưu vào thư mục file đã upload

function save_file($fileldname, $target_dir)
{
    $file_uploaded = $_FILES[$fileldname];
    $file_name = basename($file_uploaded['name']);
    $target_path = $target_dir . $file_name;
    move_uploaded_file($file_uploaded['tmp_name'], $target_path);
    return $file_name;
}

// tạo cookies
function add_cookie($name, $value, $day)
{
    setcookie($name, $value, time() + (86400 * $day), "/");
}

// xoá cookies
function delete_cookie($name)
{
    add_cookie($name, "", -1);
}
// đọc cookies
function get_cookie($name)
{
    return $_COOKIE[$name] ?? '';
}

// kiểm tra đằng nhập
function check_login()
{
    global $site_url;
    if (isset($_SESSION['user'])) {
        if ($_SESSION['user']['vai_tro'] == 1) {
            return;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/admin/') == false) {
            return;
        }
    }

    $_SESSION['name_page'] = 'trang_chu';
    header("location: $site_url/tai-khoan/dang-nhap.php");
    die;
}