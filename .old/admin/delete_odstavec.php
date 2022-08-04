<?php /* Delete odstavce článku */
SESSION_START();

require_once('../connect/db_connect.php');

$obrazek = "../img/clanky/" . Db::queryAll('SELECT * FROM `taf_clanek_odstavce` WHERE `id_odstavce` = "'.$_GET["id"].'"')[0]["obrazek"];

if (file_exists($obrazek)) @unlink($obrazek);

Db::query('DELETE FROM `taf_clanek_odstavce` WHERE `id_odstavce` = "'.$_GET["id"].'"');

$_SESSION["message"] = "Vybraný odstavec byl úspěšně smazán.";
Header("Location: " . $_SERVER["HTTP_REFERER"]);
 ?>