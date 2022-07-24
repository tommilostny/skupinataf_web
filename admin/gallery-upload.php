<?php /* Upload Profile Pic */
SESSION_START();

$target_dir = "../img/";
$target_file = $target_dir . basename($_FILES["gallery_fotka"]["name"]);

if (file_exists($target_file))
{
    $_SESSION["message"] = "Soubor ".$_FILES["gallery_fotka"]["name"]." již je v galerii. Pokud je to nový obrázek, zkuste jej nahrát pod jiným názvem.";
}
else
{
    if (move_uploaded_file($_FILES["gallery_fotka"]["tmp_name"], $target_file)) 
    {    
        require_once('../connect/db_connect.php');

        Db::query('INSERT INTO `taf_gallery` (`fotka`)
                            VALUES (?)', $_FILES["gallery_fotka"]["name"]);
       $_SESSION["message"] = "Obrázek byl úspěšně nahrán do galerie.";
    } 
    else
    {
        $_SESSION["message"] = "Sorry, there was an error uploading ". basename($_FILES["gallery_fotka"]["name"]);
    }
}

Header("Location:index.php?s=o-nas#galerie");
?>