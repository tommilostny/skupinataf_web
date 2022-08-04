<?php /* Delete kapitoly článku */
SESSION_START();

require_once('../connect/db_connect.php');

foreach (Db::queryAll('SELECT * FROM `taf_clanek_odstavce` WHERE `id_kapitoly` = "'.$_GET["id_kapitoly"].'"') as $item)
{
    if (!is_null($item["obrazek"]))
    {
        @unlink("../img/clanky/".$item["obrazek"]);
    }
}

Db::query('DELETE FROM `taf_clanek_odstavce` WHERE `id_kapitoly` = "'.$_GET["id_kapitoly"].'"');
Db::query('DELETE FROM `taf_clanek_kapitoly` WHERE `id_kapitoly` = "'.$_GET["id_kapitoly"].'"');

$_SESSION["message"] = "Vybraná kapitola a její obsah byly úspěšně smazány.";
Header("Location: " . $_SERVER["HTTP_REFERER"]);
?>