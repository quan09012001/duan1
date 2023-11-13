<h3 class="product-name">Sản phẩm đặc biệt</h3>
<?php foreach ($hh_db as $hh_db) :
    extract($hh_db);
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
        <h3 class="product-name">
            <a href="<?= $site_url . '/hang-hoa/chi-tiet.php?ma_hh=' . $ma_hh ?>">
                <?= $ten_hh ?>
            </a>
        </h3>
        <del class="original-price"><?= number_format($don_gia, 0, ',') ?>đ </del>
        <p class="discounted-price">
            <?= number_format($don_gia - $giam_gia, 0, ',') ?>đ
        </p>
        <?= $giam_gia == 0 ? '' : 'Giảm: ' . $percent_discount . '%' ?>
        <a href="<?= $site_url . "/cart/add-cart.php?id=" . $ma_hh ?>" class="add-to-cart">Thêm vào giỏ hàng</a>
    </div>
<?php endforeach; ?>