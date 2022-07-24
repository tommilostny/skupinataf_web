<?php /* Upload popisek obrázku clanku */
SESSION_START();

require_once('../connect/db_connect.php');

Db::query('UPDATE `taf_clanek_odstavce`
SET `popisek_obrazku` = "'. $_POST["popisek_obrazku"] .'"
WHERE `id_odstavce` = "'.$_GET["id"].'"');

$_SESSION["message"] = "Popisek obrázku byl úspěšně aktualizován.";
Header("Location: " . $_SERVER["HTTP_REFERER"]);
?>