<?php /* Upload uvodni text clanku */
SESSION_START();

require_once('../connect/db_connect.php');

$uvodni_text = str_replace("\n", "</p><p>", $_POST["uvod"]);

Db::query('UPDATE `taf_clanky_hlavni_1`
SET `uvod` = "'. $uvodni_text .'"
WHERE `id_clanek` = "'.$_POST["id_clanek"].'"');

$_SESSION["message"] = "Úvodní text článku byl úspěšně aktualizován.";
Header("Location: index.php?s=edit_clanek&id=".$_POST["id_clanek"]) ?>