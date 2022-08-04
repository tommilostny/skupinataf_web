<?php /* Delete from taf_aktualne */
SESSION_START();

require_once('../connect/db_connect.php');

Db::query('DELETE FROM `taf_aktualne` WHERE `img` = "'.$_GET["img"].'"');
@unlink("../img/aktualne/".$_GET["img"]);

$_SESSION["message"] = "Vybraný obrázek byl ze sekce Aktuálně úspěšně smazán.";
Header("Location: index.php?s=aktualita") ?>