<?php /* Delete filmy */
SESSION_START();

require_once('../connect/db_connect.php');

$obrazky = Db::queryAll('SELECT `nahledak`,`filmdat_stamp` FROM `taf_filmy` WHERE `id` = "'.$_GET["id"].'"')[0];
Db::query('DELETE FROM `taf_filmy` WHERE `id` = "'.$_GET["id"].'"');
@unlink("../".$obrazky["nahledak"]);
if (!is_null($obrazky["filmdat_stamp"])) @unlink("../".$obrazky["filmdat_stamp"]);

$_SESSION["message"] = "Vybraný film byl úspěšně smazán.";
Header("Location: index.php?s=film") ?>