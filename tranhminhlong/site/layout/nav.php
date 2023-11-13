<ul class="horizontal-menu">
    <?php
    if (isset($_SESSION['name_page'])) {
        $name_page = $_SESSION['name_page'];
    }
    ?>
    <li>
        <a href="<?= $site_url ?>/trang-chinh/index.php">Trang chủ</a>
    </li>
    <li>
        <a href="<?= $site_url ?>/trang-chinh/index.php?san-pham">Sản phẩm</a>
    </li>
    <li>
        <a href="<?= $site_url ?>/trang-chinh/index.php?gioi-thieu">Giới thiệu</a>
    </li>
    <li>
        <a href="<?= $site_url ?>/trang-chinh/index.php?bai-viet">Bài viết</a>
    </li>
</ul>
