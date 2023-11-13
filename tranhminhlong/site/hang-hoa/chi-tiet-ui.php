<div class="product-details">
    <a href="#">
        <img height="40" src="<?= $upload_url . "/products/" . $hinh ?>" class="product-image" />
    </a>
    <h4 class="product-name"><?= $ten_hh ?></h4>
    <?php
    if ($don_gia > 0) {
        $percent_discount = number_format($giam_gia / $don_gia * 100);
    } else {
        $percent_discount = 0;
    }
    ?>
    <del class="original-price"><?= number_format($don_gia, 0, ',') ?>đ</del>
    <p class="discounted-price"><?= number_format($don_gia - $giam_gia, 0, ',') ?>đ</p>
</div>
<a href="<?= $site_url . "/cart/add-cart.php?id=" . $ma_hh ?>" class="add-to-cart-button">Thêm vào giỏ hàng</a>
<p class="product-description"><?= $mo_ta ?></p>
<?php require "./binh-luan.php"; ?>

<section class="related-products">
    <h3>Sản phẩm cùng loại</h3>
    <?php require "./hang-cung-loai.php"; ?>
</section>
