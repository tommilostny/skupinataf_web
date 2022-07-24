<?php /* Upload T&F O nas Popisek */
SESSION_START();

require_once('../connect/db_connect.php');

$popis_skupiny = str_replace("\n", "</p><p>", $_POST["skupina_popis"]);

Db::query('UPDATE `taf_info`
SET `text` = "'. $popis_skupiny .'"
WHERE `id` = "1"');

$_SESSION["message"] = "Popisek skupiny úspěšně aktualizován.";
Header("Location: index.php?s=o-nas") ?>