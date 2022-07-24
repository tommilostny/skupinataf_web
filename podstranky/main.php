<center>    <!-- T&F logo -->
                <img class="img-responsive imgage_hover" src="img/untitled.png" />
            </center>
            <hr />
            <h2><img src="img/aktualne.png" class="icon"> Aktuálně</h2>
             <!-- Swiper -->
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php $aktuality = Db::queryAll("SELECT * FROM `taf_aktualne` ORDER BY `id` DESC");
                    for ($i = 0; $i < 3; $i++) { ?>
                        <div class="swiper-slide">
                            <img src="img/aktualne/<?php echo $aktuality[$i]["img"]; ?>" />
                        </div>
                    <?php } ?>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"></div>
            </div>
<?php /*
            <br />
            <div class="row">
                <div class="col-md-offset-0 col-md-6 col-sm-offset-2 col-sm-8 col-xs-offset-0 col-xs-12">
                    <h3><img src="img/icons/active/clanky.png" alt="Note icon" class="icon"> Náš nejnovější článek</h3>
                    <?php $clanek = Db::queryAll('SELECT * FROM `taf_clanky_hlavni_1` WHERE `public`=1 ORDER BY `id_clanek` DESC')[0]; ?>
                    <a href="?s=clanky&view=<?php echo $clanek["odkaz"]; ?>" class="tlacitko6">
                        <img src="img/clanky/<?php echo $clanek["nahledak"]; ?>" class="img-responsive" />
                        <p><?php echo $clanek["nazev"]; ?></p>
                    </a>
                    <h3><img src="img/icons/active/clanky.png" alt="Facebook icon" class="icon"> Napsali o nás</h3>
                    <a href="http://www.halahoj.org/novinky/marien-351-4/" target="_blank" class="tlacitko6">
                        <p>MARIEN</p>
                        <div class="non">(...)V rámci večera se bude promítat i film shrnující oslavy 15 let Halahoje. Bude se jednat o soubor sestřihů z akcí, které vznikaly během celého roku.(...)</div>
                    </a>
                    <center>
                        <a href="?s=clanky" class="tlacitko4">Všechny články</a>
                    </center>
                </div>
                <div class="col-md-offset-0 col-md-6 col-sm-offset-2 col-sm-8 col-xs-offset-0 col-xs-12">

            <!-- Facebook Feed -->
            <h3><img src="img/facebook.png" alt="Facebook icon" class="icon"> Aktuálně na našem <a href="https://www.facebook.com/TvurciSkupinaTaF" target="_blank">Facebooku</a></h3>
            <!-- Old
            <div class="powr-social-feed" id="8c4dcbf0_1579875312"></div><script src="https://www.powr.io/powr.js?platform=html"></script>
            -->
            <!-- New -->
            <script src="https://apps.elfsight.com/p/platform.js" defer></script>
            <div class="elfsight-app-4b30d51f-f174-4922-98f2-147cb108f5e7"></div>
</div> </div>
*/ ?>
            <hr /><h2><img src="img/icons/active/o-nas.png" alt="people icon" class="icon"> Členové skupiny</h2>
            <?php $users = Db::queryAll('SELECT * FROM `taf_users` ORDER BY `id` DESC'); ?>
            <div class="row">
                <div class="col-md-offset-2 col-md-4 col-sm-offset-2 col-sm-4 col-xs-offset-2 col-xs-4">
                    <center>
                        <div class="img-onas"><a href="?s=o-nas#<?php echo $users[0]["username"]; ?>"><img src="img/<?php echo $users[0]["profile_pic"]; ?>" class="img-responsive img-circle" /></a></div>
                        <h3><?php echo $users[0]["full_name"]; ?></h3>
                    </center>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <center>
                        <div class="img-onas"><a href="?s=o-nas#<?php echo $users[1]["username"]; ?>"><img src="img/<?php echo $users[1]["profile_pic"]; ?>" class="img-responsive img-circle" /></a></div>
                        <h3><?php echo $users[1]["full_name"]; ?></h3>
                    </center>
                </div>
            </div>
   <hr />
            <h2><img src="img/icons/active/filmy.png" alt="film icon" class="icon"> Nejnovější filmy</h2>
            <div class="row">
            <?php $filmy = Db::queryAll('SELECT * FROM `taf_filmy` ORDER BY `taf_filmy`.`id` DESC'); 
                for ($i = 0; $i < 3; $i++) { ?>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <h3><?php echo $filmy[$i]["nazev"]; ?></h3>
                        <div class="obr1">
                            <a href="?s=filmy&view=<?php echo $filmy[$i]["page"]; ?>">
                                <img src="<?php echo $filmy[$i]["nahledak"]; ?>">
                            </a>
                        </div>
                    </div>
            <?php } ?>
            </div>
            <center>
                <a href="?s=filmy" class="tlacitko4">Naše další tvorba</a>
            </center>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper('.swiper-container', {
    spaceBetween: 30,
    grabCursor: true,
    centeredSlides: true,
    effect: 'cube',
    cubeEffect: {
        shadow: true,
        slideShadows: true,
        shadowOffset: 20,
        shadowScale: 0.94,
      },
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    loop: true,
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
  });
</script>