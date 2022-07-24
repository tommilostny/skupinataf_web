<?php /* Upload uvodni text clanku */
SESSION_START();

require_once('../connect/db_connect.php');

$text_odstavce = str_replace("\n", "</p><p>", $_POST["text"]);

Db::query('UPDATE `taf_clanek_odstavce`
SET `text` = \''. $text_odstavce .'\'
WHERE `id_odstavce` = "'.$_GET["id"].'"');

$_SESSION["message"] = "Text odstavce byl úspěšně aktualizován.";
Header("Location: " . $_SERVER["HTTP_REFERER"]);
?>