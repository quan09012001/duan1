<?php foreach ($hh_cung_loai as $hh_cl) :
    if ($don_gia > 0) {
        $p_d_hh_cl = number_format($hh_cl['giam_gia'] / $hh_cl['don_gia'] * 100);
    } else {
        $p_d_hh_cl = 0;
    }
?>
    <div class="product-details">
        <!-- Thanh dấu sản phẩm -->
        <span class="product-discount">
            <?= $hh_cl['giam_gia'] == 0 ? '' : '-' . $p_d_hh_cl . '%' ?>
        </span>
        <!-- Ảnh sản phẩm -->
        <a href="<?= $site_url . '/hang-hoa/chi-tiet.php?ma_hh=' . $hh_cl['ma_hh'] ?>" data-abc="true">
            <img src="<?= $upload_url . "/products/" . $hh_cl['hinh'] ?>" class="product-image">
        </a>
        <!-- Tiêu đề sản phẩm -->
        <h3 class="product-name">
            <a href="<?= $site_url . '/hang-hoa/chi-tiet.php?ma_hh=' . $hh_cl['ma_hh'] ?>" data-abc="true"><?= $hh_cl['ten_hh'] ?></a>
        </h3>
        <!-- Giá sản phẩm -->
        <!-- Giá gốc với đường gạch ngang -->
        <del class="original-price"><?= number_format($hh_cl['don_gia'], 0, ',') ?>đ</del>
        <!-- Giá sau giảm giá với màu đỏ và in đậm -->
        <p class="discounted-price">
            <?= number_format($hh_cl['don_gia'] - $hh_cl['giam_gia'], 0, ',') ?>đ
        </p>
        <!-- Nút thêm vào giỏ hàng -->
        <a href="<?= $site_url . "/cart/add-cart.php?id=" . $hh_cl['ma_hh'] ?>" class="add-to-cart-button">Thêm vào giỏ hàng</a>
    </div>
<?php endforeach; ?>
