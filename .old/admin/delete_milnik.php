<?php /* Delete milníku */
SESSION_START();

require_once('../connect/db_connect.php');

Db::query('DELETE FROM `taf_milniky` WHERE `id` = "'.$_GET["id"].'"');

$_SESSION["message"] = "Vybraný milník byl úspěšně smazán.";
Header("Location: index.php?s=milnik") ?>