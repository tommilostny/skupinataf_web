<?php
if (!isset($_GET['view'])) {    //Standard o nás
    ?>
    <h1><img src="img/icons/active/o-nas.png" alt="people icon" class="icon"> O nás</h1>
    <p><?php echo Db::queryAll("SELECT * FROM `taf_info`")[0]["text"]; ?></p>
    <center>
        <a href="?s=o-nas&view=nase-dulezite-milniky" class="tlacitko7"><img src="img/icons/history.png" alt="past icon" class="icon-small"> Naše důležité milníky</a>
    </center>        
    <br />
    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php
            $gallery = Db::queryAll("SELECT * FROM `taf_gallery` ORDER BY id DESC");
            foreach ($gallery as $photo)
            {
                ?>
                <div class="swiper-slide">
                    <img src="img/<?php echo $photo["fotka"]; ?>" class="swiper-lazy" />
                    <div class="swiper-lazy-preloader"></div>
                </div>
                <?php
            }
            ?>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
    </div>

    <br />
    <?php
        $users = Db::queryAll('SELECT * FROM `taf_users` ORDER BY `id` DESC');
        foreach ($users as $user)
        {
            ?><a id="<?php echo $user["username"]; ?>" style="position:relative; top:-100px"></a>
            <hr />
            <div class="row">
                <div class="col-md-3 col-xs-5">
                    <img src="img/<?php echo $user["profile_pic"]; ?>" class="img-responsive img-circle" style="margin-bottom: 10px" />
                </div>
                <div class="col-md-9 col-sm-7">
            <h3><?php echo $user["full_name"]; ?></h3>
            <p><?php echo $user["popis"]; ?></p>
            <?php
                if (!empty($user["facebook"]))
                { ?>
                    <a href="<?php echo $user["facebook"]; ?>" target="_blank"><img src="img/facebook.png" class="ikonakontakt" /></a>
            <?php }
                if (!empty($user["twitter"]))
                { ?>
                    <a href="<?php echo $user["twitter"]; ?>" target="_blank"><img src="img/twitter.png" class="ikonakontakt" /></a>
            <?php }
                if (!empty($user["instagram"]))
                { ?>
                    <a href="<?php echo $user["instagram"]; ?>" target="_blank"><img src="img/instagram.png" class="ikonakontakt" /></a>
            <?php }
                if (!empty($user["filmdat"]))
                { ?>
                    <a href="<?php echo $user["filmdat"]; ?>" target="_blank"><img src="img/filmdat.png" class="ikonakontakt" /></a>
            <?php }
                if (!empty($user["e-mail"]))
                { ?>
                    <a href="mailto:<?php echo $user["e-mail"]; ?>"><img src="img/email.png" class="ikonakontakt" /></a>
            <?php }
                if (!empty($user["telefon"]))
                { ?>
                    <a href="tel:<?php echo $user["telefon"]; ?>"><img src="img/phone.png" class="ikonakontakt" /></a>
            <?php } ?>
        </div>
    </div>
    <?php
    }

    if(preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])){ ?>
        <style>
            .swiper-slide img {
                width: 97%;
            }
        </style>
        <!-- Initialize Swiper (Mobile) -->
        <script>
        var swiper = new Swiper('.swiper-container', {
            spaceBetween: 30,
            grabCursor: true,
            centeredSlides: true,
            autoplay: {
            delay: 4000,
            disableOnInteraction: false,
            },
            loop: true,
            loopFillGroupWithBlank: false,
            pagination: {
            el: '.swiper-pagination',
            clickable: true,
            },
            navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
            },
            keyboard: {
                enabled: true,
            },
            preloadImages: false,
            lazy: true
        });
        </script>
    <?php
    }
    else { ?>
        <style>
            .swiper-slide img {
                width: 100%;
            }
        </style>
        <!-- Initialize Swiper (PC) -->
        <script>
        var swiper = new Swiper('.swiper-container', {
            spaceBetween: 30,
            slidesPerView: 2,
            effect: 'cards',
            grabCursor: true,
            centeredSlides: true,
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            loop: true,
            loopFillGroupWithBlank: false,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            keyboard: {
                enabled: true,
            },
            preloadImages: false,
            lazy: true,
            watchSlidesProgress: true,
        });
        </script>

    <?php }
} 
else 
{
?> <script>
    document.title = "Naše důležité milníky | O nás | Tvůrčí skupina T&F";
</script>
    <h1><img src="img/icons/history.png" alt="past icon" class="icon"> Naše důležité milníky</h1>
    <table class="table" style="margin-bottom: 0px">
<?php
$milniky = Db::queryAll('SELECT * FROM `taf_milniky` ORDER BY `id` DESC');
foreach ($milniky as $milnik)
{
    echo "<tr><td>".$milnik["datum"]."</td>";
    echo "<td>".$milnik["text"]."</td></tr>";
} ?>
<table><hr style="margin-top: 0px" />
<?php } ?>