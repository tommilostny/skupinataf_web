<?php /* Upload Aktuálně */
SESSION_START();

if (!empty($_FILES["aktualne"]["name"]))
{
    $target_dir = "../img/aktualne/";
    $target_file = $target_dir . basename($_FILES["aktualne"]["name"]);
    if (file_exists($target_file))
    {
        $_SESSION["message"] = "Soubor ". basename( $_FILES["aktualne"]["name"]). " již existuje. Prosím přejmenujte soubor k nahrání.";
    }
    else
    {
        if (move_uploaded_file($_FILES["aktualne"]["tmp_name"], $target_file))
        {
            require_once('../connect/db_connect.php');
            Db::query('INSERT INTO `taf_aktualne` (`img`) VALUES (?)', $_FILES["aktualne"]["name"]);
            
            $_SESSION["message"] = "Soubor ". basename( $_FILES["aktualne"]["name"]). " byl úspěšně nahrán.";
        } else {
            $_SESSION["message"] = "Sorry, there was an error uploading ". basename($_FILES["aktualne"]["name"]). ".";
        }
    }
}
else $_SESSION["message"] = "Prosím vyberte obrázek k nahrání.";

Header("Location: index.php?s=aktualita")
?>