<h3 class="titleh3">Hàng hoá đặc biệt</h3>
<?php foreach ($items as $item) :
    extract($item);
    if ($don_gia > 0) {
        $percent_discount = number_format($giam_gia / $don_gia * 100);
    } else {
        $percent_discount = 0;
    }
?>

<div class="product">
    <a href="<?= $site_url . '/hang-hoa/chi-tiet.php?ma_hh=' . $ma_hh ?>" data-abc="true">
        <img src="<?= $upload_url . '/products/' . $hinh ?>" alt="Ảnh sản phẩm">
    </a>
    <a class="product-name" href="<?= $site_url . '/hang-hoa/chi-tiet.php?ma_hh=' . $ma_hh ?>">
        <?= $ten_hh ?>
    </a>
    <del><?= number_format($don_gia, 0, ',') ?>đ</del>
    <p><?= number_format($don_gia - $giam_gia, 0, ',') ?>đ</p>
    <?= $giam_gia == 0 ? '' : '<span class="discount">Giảm: ' . $percent_discount . '%</span>' ?>
    <a class="add-to-cart" href="<?= $site_url . "/cart/add-cart.php?id=" . $item['ma_hh'] ?>">Thêm vào giỏ hàng</a>
</div>

<?php endforeach; ?>
