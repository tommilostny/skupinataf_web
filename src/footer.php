<?php
if (!defined('TAF_WEB_VERSION'))
{
    define('TAF_WEB_VERSION', '3.0.0');
}
?>

<div class="footer">
    <div class="verze-body"><br>
        <a target="_blank" href="https://www.youtube.com/user/Fanda39"><img class="ikonakontakt" src="img/youtube.png" width="64" /></a>
        <a target="_blank" href="http://www.filmdat.cz/sdruzeni.php?detail=127"><img class="ikonakontakt" src="img/filmdat.png" width="64" /></a>
        <a target="_blank" href="https://www.facebook.com/TvurciSkupinaTaF/"><img class="ikonakontakt" src="img/facebook.png" width="64" /></a>
        <a target="_blank" href="https://www.instagram.com/skupinataf/"><img class="ikonakontakt" src="img/instagram.png" width="64" /></a>
        <br /><br />
        <p>© <?= Page::web_name ?></p>
        <p>
          <small>v. <?= TAF_WEB_VERSION ?></small> <span style="color:gray">|</span> <small><a href="<?= $_SERVER['LINK_BASE'] ?>changelog/" target="_top">Historie webu</a></small> <span style="color:gray">|</span> <small><a href="https://icons8.com/" target="_blank">Icons8</a></small>
          <br />
          <small>Created and maintained by Tomáš Milostný 2017-<?= date("Y"); ?></small>
        </p>
    </div>
</div>