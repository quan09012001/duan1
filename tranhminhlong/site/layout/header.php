<img src="<?= $site_url ?>/trang-chinh/img/logo.png" alt="NHQ.IT.VN">
<div class="search">
    <input type="text" placeholder="Nhập từ khóa tìm kiếm...">
    <input type="submit" value="Tìm kiếm">
</div>
<div class="cart">
    <li><a href="<?= $site_url . "/cart/list-cart.php" ?>"><i class="fa-solid fa-cart-plus"></i>
            <?php
            //--số lượng hàng hoá trong giỏ hàng--
            if (isset($_SESSION['total_cart'])) {
                echo $_SESSION['total_cart'];
            } else {
                echo 0;
            }
            //------------------------------------
            ?>
        </a></li>
    <ul>
        <li class="dropdown"><a href="javascript:void(0)" class="dropbtn"><i class="fa-solid fa-user"></i>
                <?php
                //---------------hình user----------
                if (isset($_SESSION['user']) && $_SESSION['user']['hinh'] != "") { ?>
                    <img src="<?= $upload_url . "/users/" . $_SESSION['user']['hinh'] ?>" height="20" style="border-radius: 10px">
                <?php } else { ?>
                <?php }  ?>
            </a>
            <div class="dropdown-content">
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
            </div>
        </li>
    </ul>
</div>