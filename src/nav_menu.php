<?php require_once('setup.php'); ?>

<nav class="navbar navbar-fixed-top">
    <div class="container-fluid  nav_black">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            
            <?php $page->print_nav_links() ?>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="blu navbar-fixed-top">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-9">
            <a href="<?= $_SERVER['LINK_BASE'] ?>"><img src="img/taf_white.png" class="navbar-icon" /> <?= Page::web_name ?></a>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-3">
            <a data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" class="navbar-toggle"><img src="img/menu.png"></a>
        </div>
    </div>

</div>