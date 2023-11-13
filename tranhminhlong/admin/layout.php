<?php
check_login();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="icon" href="<?= $site_url ?>/trang-chinh/img/logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="<?= $content_url ?>/css/custom.css" type="text/css">
</head>

<body>
    <?php require "menu.php"; ?>
    <?php include $view_name; ?>
    <script src="<?= $content_url ?>/js/custom.js"></script>
</body>

</html>