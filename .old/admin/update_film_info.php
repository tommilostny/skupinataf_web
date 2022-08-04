<?php /* Upload Film Info */
SESSION_START();

require_once('../connect/db_connect.php');

//Create YouTube key from link https://www.youtube.com/watch?v=RDqZNLXqTuw, https://youtu.be/scSNjP4ZuaA, the key alone
$youtube_key = $_POST["youtube_key"];
if (strpos($youtube_key, 'youtube.com') !== false)
{
    $youtube_key = substr($_POST["youtube_key"], 32);
}
else if (strpos($youtube_key, 'youtu.be') !== false)
{
    $youtube_key = substr($_POST["youtube_key"], 17);
}

$popisek_videa = str_replace("\n", "</p><p>", $_POST["popis"]);

    Db::query('UPDATE `taf_filmy`
         SET `nazev` = "'. $_POST["nazev"] .'",
             `youtube_key` = "'.$youtube_key.'",
             `popis` = "'.$popisek_videa.'",
             `page` = "'.$_POST["page"].'",
             `rok` = "'.$_POST["rok"].'"
         WHERE `id` = '. $_GET["id"]);
    $_SESSION["message"] = "Informace filmu ".$_POST["nazev"]." byly úspěšně aktualizovány.";
    Header("Location:index.php?s=edit_film&id=".$_GET["id"]);
?>