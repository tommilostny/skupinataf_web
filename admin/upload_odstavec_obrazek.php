<?php
SESSION_START();
require_once('../connect/db_connect.php');

$popisek_obrazku = NULL;

if (!empty($_FILES["obrazek"]["name"]))
    {
        $target_file = "../img/clanky/" . basename($_FILES["obrazek"]["name"]);
        if (!file_exists($target_file))
        {
            if (move_uploaded_file($_FILES["obrazek"]["tmp_name"], $target_file)) 
            {    
                $obrazek = $_FILES["obrazek"]["name"];
                if (!empty($_POST["popisek_obrazku"])) $popisek_obrazku = $_POST["popisek_obrazku"];
    
                Db::query('UPDATE `taf_clanek_odstavce`
                    SET `popisek_obrazku` = "'. $popisek_obrazku .'",
                        `obrazek` = "'.$obrazek.'"
                    WHERE `id_odstavce` = "'.$_GET["id"].'"');
    
                $_SESSION["message"] = "Obrázek a jeho popisek byly úspěšně nahrány.";
            } 
        }
        else $_SESSION["message"] = "Soubor " . $_FILES["obrazek"]["name"] . " již existuje. Zkuste jej nahrát znovu pod jiným názvem.";
    }
    else $_SESSION["message"] = "Nebyl vybrán obrázek k nahrání.";

Header("Location: " . $_SERVER["HTTP_REFERER"]);
?>