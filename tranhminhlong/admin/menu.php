<style>
    #navbar {
    background-color: #333;
    padding: 10px 0;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo img {
    width: 100px; /* Adjust logo size */
}

.menu {
    list-style: none;
    display: flex;
    margin: 0;
    padding: 0;
}

.menu li {
    margin: 0 20px; /* Adjust spacing between menu items */
}

.menu a {
    text-decoration: none;
    color: #fff;
    font-size: 16px;
}

.menu a:hover {
    color: #00a0d1; /* Change color on hover */
}

.submenu {
    display: none;
    position: absolute;
    background-color: #333;
    padding: 10px;
    list-style: none;
}

.has-dropdown:hover .submenu {
    display: block;
}

.submenu li {
    margin: 0;
}

.submenu a {
    color: #fff;
}

.submenu a:hover {
    color: #00a0d1; /* Change color on hover */
}

</style>
<nav id="navbar">
        <a class="logo" href="<?= $site_url ?>/trang-chinh/">
            <img src="<?= $site_url ?>/trang-chinh/img/logo.png" alt="Logo">
        </a>
        <ul class="menu">
            <li>
                <a href="<?= $admin_url ?>/trang-chinh/">Trang chủ</a>
            </li>
            <li class="menu-item has-dropdown">
                <a href="<?= $admin_url ?>/loai-hang/index.php?btn_list">Loại hàng</a>
                <ul class="submenu">
                    <li>
                        <a href="<?= $admin_url ?>/loai-hang/">Thêm loại hàng</a>
                    </li>
                </ul>
            </li>
            <li class="menu-item has-dropdown">
                <a href="<?= $admin_url ?>/hang-hoa/index.php?btn_list">Hàng hoá</a>
                <ul class="submenu">
                    <li>
                        <a href="<?= $admin_url ?>/hang-hoa/">Thêm hàng hoá</a>
                    </li>
                </ul>
            </li>
            <li class="menu-item has-dropdown">
                <a href="<?= $admin_url ?>/khach-hang/index.php?btn_list">Khách hàng</a>
                <ul class="submenu">
                    <li>
                        <a href="<?= $admin_url ?>/khach-hang/">Thêm khách hàng</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?= $admin_url ?>/binh-luan/">Bình luận</a>
            </li>
            <li>
                <a href="<?= $admin_url ?>/thong-ke/">Thống kê</a>
            </li>
            <li>
                <a href="<?= $site_url ?>/trang-chinh/">Public</a>
            </li>
        </ul>
    </nav>
    <br>
    <br>
    <br>
    