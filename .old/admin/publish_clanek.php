<?php /* Publikovat článek */
SESSION_START();

require_once('../connect/db_connect.php');

Db::query('UPDATE `taf_clanky_hlavni_1`
SET `public` = "1"
WHERE `id_clanek` = "'.$_GET["id"].'"');

$_SESSION["message"] = "Vybraný článek byl publikován.";
Header("Location: " . $_SERVER["HTTP_REFERER"]); ?>