<?php /* Delete odstavec obrazek */
SESSION_START();

require_once('../connect/db_connect.php');

$obrazek = Db::queryAll('SELECT * FROM `taf_clanek_odstavce` WHERE `id_odstavce` = "'.$_GET["id"].'"')[0]["obrazek"];

@unlink("../img/clanky/".$obrazek);

Db::query('UPDATE `taf_clanek_odstavce`
         SET `obrazek` = NULL,
             `popisek_obrazku` = NULL
         WHERE `id_odstavce` = '. $_GET["id"]);

$_SESSION["message"] = "Obrázek vybraného odstavce byl úspěšně smazán.";
Header("Location: " . $_SERVER["HTTP_REFERER"]);
?>