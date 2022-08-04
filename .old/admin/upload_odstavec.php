<?php
SESSION_START();
require_once('../connect/db_connect.php');

$obrazek = NULL;
$popisek_obrazku = NULL;
$text = str_replace("\n", "</p><p>", $_POST["text"]);
$message = "";

if ($_GET["obr"])
{
    if (!empty($_FILES["obrazek"]["name"]))
    {
        $target_file = "../img/clanky/" . basename($_FILES["obrazek"]["name"]);
        if (!file_exists($target_file))
        {
            if (move_uploaded_file($_FILES["obrazek"]["tmp_name"], $target_file)) 
            {    
                $obrazek = $_FILES["obrazek"]["name"];
                if (!empty($_POST["popisek_obrazku"])) $popisek_obrazku = $_POST["popisek_obrazku"];
            } 
        }
        else $message = "  Obrázek " . $_FILES["obrazek"]["name"] . " nebyl nahrán, protože již existuje. Zkuste to prosím znovu pod jiným názvem.";
    }
}

Db::query('INSERT INTO `taf_clanek_odstavce` (`text`, `obrazek`, `id_kapitoly`, `popisek_obrazku`)
                        VALUES (?, ?, ?, ?)', $text, $obrazek, $_GET["id"], $popisek_obrazku);

$_SESSION["message"] = "Odstavec byl úspěšně vytvořen." . $message;
Header("Location: " . $_SERVER["HTTP_REFERER"]);
?>