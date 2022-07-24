<?php /* Delete Filmdat pikrogram */
SESSION_START();

require_once('../connect/db_connect.php');

$obrazek = Db::queryAll('SELECT * FROM `taf_filmy` WHERE `id` = "'.$_GET["id"].'"')[0]["filmdat_stamp"];

@unlink("../".$obrazek["filmdat_stamp"]);

Db::query('UPDATE `taf_filmy`
         SET `filmdat_stamp` = NULL,
             `filmdat_odkaz` = NULL
         WHERE `id` = '. $_GET["id"]);

$_SESSION["message"] = "Filmdat piktogram vybraného filmu byl úspěšně smazán.";
Header("Location: index.php?s=edit_film&id=".$_GET["id"]) ?>