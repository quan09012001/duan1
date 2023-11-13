<nav>

    <!-- Cart user -->

    <!-- Cart -->

    <a href="<?= $site_url . "/cart/list-cart.php" ?>">Hàng húa</a>
    <span>
        <?php
        if (isset($_SESSION['total_cart'])) {
            echo $_SESSION['total_cart'];
        } else {
            echo 0;
        }
        ?>
    </span>

    <!-- User -->

    <a href="#" id="dropdownMenu1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php
        if (isset($_SESSION['user']) && $_SESSION['user']['hinh'] != "") { ?>
            <img src="<?= $upload_url . "/users/" . $_SESSION['user']['hinh'] ?>" width="50" height="50">
        <?php } else { ?>
        <?php }  ?>
    </a>
    <?php
    if (isset($_SESSION['user'])) { ?>
        <span>Xin chào!</span><?= $_SESSION['user']['ho_ten'] ?>
    <?php } else {
    } ?>
    <?php
    if (isset($_SESSION['user'])) { ?>
        <?php if ($_SESSION['user']['vai_tro'] == 1) { ?>
            <a href="<?= $admin_url . "/trang-chinh/" ?>">Quản trị admin</a>
        <?php }  ?>
        <a href="<?= $site_url . '/tai-khoan/cap-nhat-tk.php' ?>">Cập nhật tài khoản</a>
        <a href="<?= $site_url . '/tai-khoan/doi-mk.php' ?>">Đổi mật khẩu</a>
        <a href="<?= $site_url . '/tai-khoan/dang-nhap.php?btn_logout' ?>">Đăng xuất</a>
    <?php } else { ?>
        <a href="<?= $site_url . '/tai-khoan/dang-nhap.php' ?>">Đăng nhập</a>
        <a href="<?= $site_url . '/tai-khoan/dang-ky.php' ?>">Đăng ký</a>
    <?php }  ?>