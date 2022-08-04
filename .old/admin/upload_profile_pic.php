
<?php /* Upload Profile Pic */
SESSION_START();

$target_dir = "../img/";
if (!empty($_FILES["profile_pic"]["name"]))
{
    $target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);

    if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) 
    {    
        require_once('../connect/db_connect.php');
    
        Db::query('UPDATE `taf_users` SET `profile_pic` = "'. $_FILES["profile_pic"]["name"] .'" WHERE id = '. $_SESSION["id"]);
        $_SESSION["message"] = "Profilový obrázek byl úspěšně aktualizován.";
    } 
    else
    {
        $_SESSION["message"] = "Sorry, there was an error uploading ". basename($_FILES["profile_pic"]["name"]);
    }
}
else $_SESSION["message"] = "Nebyl vybrán žádný obrázek k nahrání.";

Header("Location:index.php?s=edit_profile");
?>