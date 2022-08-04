<?php /* Update Filmdatu */
SESSION_START();

$target_dir = "../filmy/";
require_once('../connect/db_connect.php');

if (!empty($_POST["filmdat_odkaz"]))
{
    Db::query('UPDATE `taf_filmy` SET `filmdat_odkaz` = "'.$_POST["filmdat_odkaz"].'" WHERE id = '. $_GET["id"]);

    if (!empty($_FILES["filmdat_stamp"]["name"]))
    {
        $target_file = $target_dir . basename($_FILES["filmdat_stamp"]["name"]);
    
        $current_filmdat_stamp = Db::queryAll("SELECT * FROM `taf_filmy` WHERE `id` = \"".$_GET["id"].'"')[0]["filmdat_stamp"];

        if (!is_null($current_filmdat_stamp)) @unlink("../".$current_filmdat_stamp);

        if (move_uploaded_file($_FILES["filmdat_stamp"]["tmp_name"], $target_file)) 
        {    
            Db::query('UPDATE `taf_filmy` SET `filmdat_stamp` = "'. substr($target_file, 3) .'" WHERE id = '. $_GET["id"]);
        } 
        else
        {
            $_SESSION["message"] = "Sorry, there was an error uploading ". basename($_FILES["filmdat_stamp"]["name"]);
        }
    }
    $_SESSION["message"] = "Filmdat vybraného filmu byl úspěšně aktualizován.";
}
else $_SESSION["message"] = "Filmdat odkaz nemůže být prázdný.";

Header("Location:index.php?s=edit_film&id=".$_GET["id"]);
?>