<?php /* Upload Profile Info */
SESSION_START();

require_once('../connect/db_connect.php');

$popis_osoby = str_replace("\n", "</p><p>", $_POST["popis"]);

    Db::query('UPDATE `taf_users`
         SET `full_name` = "'. $_POST["full_name"] .'",
             `popis` = "'.$popis_osoby.'",
             `twitter` = "'.$_POST["twitter"].'",
             `instagram` = "'.$_POST["instagram"].'",
             `e-mail` = "'.$_POST["e-mail"].'",
             `filmdat` = "'.$_POST["filmdat"].'",
             `facebook` = "'.$_POST["facebook"].'",
             `telefon` = "'.$_POST["telefon"].'"
         WHERE `id` = '. $_SESSION["id"]);
         
    $_SESSION["message"] = "Informace profilu ".$_SESSION["login"]." byly úspěšně aktualizovány.";
    Header("Location:index.php?s=edit_profile");
?>