<div class="sidebar">
    <h2 class="category-heading">Danh mục</h2>
    <ul class="category-list">
        <?php foreach ($ds_loai as $loai) : ?>
            <li>
                <a href="<?= $site_url . "/hang-hoa/liet-ke.php?ma_loai=" . $loai['ma_loai'] ?>" class="category-link"><?= $loai['ten_loai'] ?></a>
            </li>
        <?php endforeach ?>
    </ul>
</div>
