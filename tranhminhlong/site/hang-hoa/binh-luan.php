<h4>Đánh giá</h4>
            <?php foreach ($binh_luan_list as $bl) : ?>
                <span aria-hidden="true"></span>
                <meta itemprop="datePublished" content="01-01-2016"><?= $bl['ngay_bl'] ?>
                <?php for ($i = 1; $i <= $bl['rating']; $i++) {
                    echo '<span></span>';
                } ?>

                by <b><?= $bl['ho_ten'] ?></b>
                <img width="40" height="40"
                    src="<?= $upload_url . "/users/" . $bl['hinh'] ?>" />
                <p><?= $bl['noi_dung'] ?></p>
                <hr>
            <?php endforeach ?>
            <nav aria-label="...">
                <ul>
                    <?php for ($i = 1; $i <= $_SESSION['total_page']; $i++) { ?>
                    <li>
                        <a href="?ma_hh=<?= $ma_hh ?>&page=<?= $i ?>"><?= $i ?></a>
                    </li>
                    <?php } ?>
                </ul>
            </nav>
        <?php
        if (!isset($_SESSION['user'])) {
            echo '<h4>Đăng nhập để bình luận về sản phẩm này</h4>';
        } else {
        ?>
            <h4>Để lại bình luận</h4>
            <form action="" method="POST">
                    <input type="radio" name="rating" value="5" id="5" checked>
                    <label for="5">5☆</label>
                    <input type="radio" name="rating" value="4" id="4">
                    <label for="4">4☆</label>
                    <input type="radio" name="rating" value="3" id="3">
                    <label for="3">3☆</label>
                    <input type="radio" name="rating" value="2" id="2">
                    <label for="2">2☆</label>
                    <input type="radio" name="rating" value="1" id="1">
                    <label for="1">1☆</label>
                    <textarea name="noi_dung" placeholder="Nội dung..." rows="4"></textarea>
                    <button type="submit">Đăng bình luận
                    </button>
            </form>
        <?php
        } ?>
