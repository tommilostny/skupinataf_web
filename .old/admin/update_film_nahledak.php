<?php /* Update náhledáku */
SESSION_START();

$target_dir = "../filmy/";
if (!empty($_FILES["nahledak"]["name"]))
{
    $target_file = $target_dir . basename($_FILES["nahledak"]["name"]);
    
    require_once('../connect/db_connect.php');

    @unlink("../".Db::queryAll("SELECT * FROM `taf_filmy` WHERE `id` = \"".$_GET["id"].'"')[0]["nahledak"]);

    if (move_uploaded_file($_FILES["nahledak"]["tmp_name"], $target_file)) 
    {    
        Db::query('UPDATE `taf_filmy` SET `nahledak` = "'. substr($target_file, 3) .'" WHERE id = '. $_GET["id"]);
        $_SESSION["message"] = "Náhledový obrázek byl úspěšně aktualizován.";
    } 
    else
    {
        $_SESSION["message"] = "Sorry, there was an error uploading ". basename($_FILES["nahledak"]["name"]);
    }
}
else $_SESSION["message"] = "Nebyl vybrán žádný obrázek k nahrání.";

Header("Location:index.php?s=edit_film&id=".$_GET["id"])
?>