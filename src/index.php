<?php require_once('setup.php'); ?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <title><?= $page->get_title() ?></title>

    <meta charset="utf-8" />
    <!--
    <meta name="description" content="Dvojice nadšených filmařů z Vysočiny, která tvoří autorská umělecká videa, reportáže, sestřihy a záznamy akcí na přání.">
    -->
    <meta name="author" content="Tomáš Milostný">
    <!--
    <meta property="og:image" content="nahledak.jpg">
    -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- T&F CSS -->
    <!--
    <link rel="stylesheet" href="style.css" type="text/css" />
    -->
</head>
<body>
    <?php include "messenger_chat.php" ?>
    <?php include "nav_menu.php" ?>

    <!-- CONTENT -->

    <?php include "footer.php" ?>
</body>
</html>