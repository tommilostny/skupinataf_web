<?php /* Upload T&F O nas Popisek */
SESSION_START();

require_once('../connect/db_connect.php');

Db::query('DELETE FROM `taf_gallery` WHERE `fotka` = "'.$_GET["fotka"].'"');
@unlink("../img/".$_GET["fotka"]);

$_SESSION["message"] = "Vybraný obrázek byl z galerie úspěšně smazán.";
Header("Location: index.php?s=o-nas#galerie") ?>