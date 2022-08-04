<?php /* Upload zaverecny text clanku */
SESSION_START();

require_once('../connect/db_connect.php');

$zaverecny_text = str_replace("\n", "</p><p>", $_POST["zaver"]);

Db::query('UPDATE `taf_clanky_hlavni_1`
SET `zaver` = "'. $zaverecny_text .'"
WHERE `id_clanek` = "'.$_POST["id_clanek"].'"');

$_SESSION["message"] = "Závěrečný text článku byl úspěšně aktualizován.";
Header("Location: index.php?s=edit_clanek&id=".$_POST["id_clanek"]) ?>