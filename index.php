<?php
    header("Cache-Control: no-cache, must-revalidate"); 
    header("Expires: Sat, 04 July 1979 09:00:00 GMT"); // Past date 

    require_once('connect/db_connect.php');

    if (isset($_GET['s'])) $stranka = $_GET['s'];
    else $stranka = 'main';

	$stranky = array(
        'main' => "Hlavní stránka",
        'o-nas' => "O nás",
        'filmy' => "Naše filmy",
        'clanky' => "Články",
    );
?>

<!DOCTYPE html>
<html lang="cs" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-142925805-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-142925805-1');
    </script>

    <title><?php if ($stranka != "main") echo $nazvy[$stranka] . " | "; ?>Tvůrčí skupina T&F</title>
    <meta charset="utf-8" />
    <meta name="description" content="Dvojice nadšených filmařů z Vysočiny, která tvoří autorská umělecká videa, reportáže, sestřihy a záznamy akcí na přání.">
    <meta name="author" content="Tom Milostný">
    <meta property="og:image" content="nahledak.jpg">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Swiper -->
    <link
        rel="stylesheet"
        href="https://unpkg.com/swiper@8/swiper-bundle.min.css"
    />
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

    <!-- T&F CSS -->
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v9.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/cs_CZ/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="1812129042367683"
        theme_color="#0A7CFF"
        logged_in_greeting="Máte zájem o video? Neváhejte napsat!"
        logged_out_greeting="Máte zájem o video? Neváhejte napsat!">
      </div>

<nav class="navbar navbar-fixed-top">
    <div class="container-fluid  nav_black">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php
                foreach ($stranky as $key => $value)
                {
                    echo '<div class="navigace';
                    if ($key == $stranka)
                    {
                        echo ' aktivni"><a href="?s='.$key.'"><img src="img/icons/active/'.$key;
                    }
                    else
                    {
                        echo '"><a href="?s='.$key.'"><img src="img/icons/'.$key;
                    }
                    echo '.png"> '.$value.'</a></div>';   
                }
            ?>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="blu navbar-fixed-top">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-9">
            <a href="?s=main"><img src="img/taf_white.png" class="navbar-icon" /> Tvůrčí skupina T&F</a>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-3">
            <a data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" class="navbar-toggle"><img src="img/menu.png"></a>
        </div>
    </div>

</div>
        

<div class="container black">
    <?php    
    if (preg_match('/^[a-z0-9.-]+$/', $stranka))
    {
        error_reporting(0);
        $vlozeno = include('podstranky/' . $stranka . '.php');
        if (!$vlozeno)
            echo('<br /><br /><br /><br /><h2 align=center>Error 404 - Page not found.</h2><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />');
    }
    else
        echo('<h2>Neplatný parametr.</h2>');
    ?>
<br /><br /><br /><br />
        </div><!-- That's so wrong... (brrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr) -->
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        <div class="footer">
            <div class="verze-body"><br>
        <a target="_blank" href="https://www.youtube.com/user/Fanda39"><img class="ikonakontakt" src="img/youtube.png" width="64" /></a>
        <a target="_blank" href="http://www.filmdat.cz/sdruzeni.php?detail=127"><img class="ikonakontakt" src="img/filmdat.png" width="64" /></a>
        <a target="_blank" href="https://www.facebook.com/TvurciSkupinaTaF/"><img class="ikonakontakt" src="img/facebook.png" width="64" /></a>
        <a target="_blank" href="https://www.instagram.com/skupinataf/"><img class="ikonakontakt" src="img/instagram.png" width="64" /></a>
        <br /><br />
        <p>© T&F Creative Group</p>
        <p>
          <small>v. 2.4.2</small> <span style="color:gray">|</span> <small><a href="?s=changelog" target="_top">Historie webu</a></small> <span style="color:gray">|</span> <small><a href="https://icons8.com/" target="_blank">Icons8</a></small>
          <br />
          <small>Created and maintained by Tomáš Milostný 2017-<?php echo date("Y"); ?></small>
        </p>
        </div>
        <br /><br /><br /><br />
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./Starter Template for Bootstrap_files/jquery-3.1.1.slim.min.js.stažený soubor" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="./Starter Template for Bootstrap_files/tether.min.js.stažený soubor" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="./Starter Template for Bootstrap_files/bootstrap.min.js.stažený soubor"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./Starter Template for Bootstrap_files/ie10-viewport-bug-workaround.js.stažený soubor"></script>
</body>
</html>