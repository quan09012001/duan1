<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width">

<head>
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= $content_url ?>/css/all.min.css">
    <link rel="stylesheet" href="<?= $content_url ?>/style/style.css">
    <script src="<?= $content_url ?>/js/videoplay.js"></script>
    <link rel="shortcut icon" href="<?= $site_url ?>/trang-chinh/img/ico.png" type="image/x-icon">
</head>

<body>
    <div class="container">
        <header>
        <?php require "../layout/header.php"; ?>
        </header>
        <nav>
            <?php require "../layout/nav.php"; ?>
            <div class="mobie">
                <i class="fa-solid fa-bars" style="color: #ffffff; font-size: 20px;"></i>
                <div class="cart">
                    <li><a href="html/user.html"><i class="fa-solid fa-user" style="color: #ffffff; font-size: 20px;"></i></a>
                    </li>
                    <li><a href="html/cart.html"><i class="fa-solid fa-cart-plus" style="color: #ffffff; font-size: 20px;"></i></a></li>
                </div>
            </div>
        </nav>
        <?php
        //---------------hello user-----------------
        if (isset($_SESSION['user'])) { ?>
            <span>Xin chào !</span><?= $_SESSION['user']['ho_ten'] ?><span>.Cảm ơn bạn đã ghé thăm trang web của chúng tôi!</span>
        <?php } else {
        }
        //--------------------------------------------
        ?>
        <main>
            <?php include $view_name ?>
        </main>
        <footer>
            <?php require "../layout/footer.php"; ?>
        </footer>
    </div>
</body>

</html>