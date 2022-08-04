<?php /* Upload Článek */
SESSION_START();

$target_dir = "../img/clanky/";
$target_file = $target_dir . basename($_FILES["nahledak"]["name"]);

if (!file_exists($target_file))
{
    if (move_uploaded_file($_FILES["nahledak"]["tmp_name"], $target_file))
    {
        require_once('funkce.php');
        require_once('../connect/db_connect.php');
    
        $odkaz = CreateLink($_POST["nazev"]);
        
        Db::query('INSERT INTO `taf_clanky_hlavni_1` (`nazev`, `nahledak`, `odkaz`)
                            VALUES (?, ?, ?)', $_POST['nazev'], $_FILES["nahledak"]["name"], $odkaz);
    
        $_SESSION["message"] = "Článek ".$_POST['nazev']." byl úspěšně registrován.";    
    } 
    else
    {
        $_SESSION["message"] = "Sorry, there was an error uploading ". basename($_FILES["nahledak"]["name"]). ".<br>";
    }
}
else $_SESSION["message"] = "Článek nebyl založen, protože soubor " . $_FILES["nahledak"]["name"] . " již existuje. Zkuste to prosím znovu pod jiným názvem.";

Header("Location: index.php?s=clanek");
?>