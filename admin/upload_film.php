<?php /* Upload Film */
SESSION_START();

if (!empty($_POST["nazev"]))
{
    if (!empty($_POST["youtube_key"]))
    {
        if (!empty($_POST["popis"]))
        {
            if (!empty($_FILES["nahledak"]["name"]))
            {
                require_once('../connect/db_connect.php');

                $target_dir = "../filmy/";
                $target_file = $target_dir . basename($_FILES["nahledak"]["name"]);
                $target_file1 = NULL;
                $ok = true;
                
                if (move_uploaded_file($_FILES["nahledak"]["tmp_name"], $target_file))
                {
                    
                } 
                else $ok = false;
                $target_file = substr($target_file, 3);
                
                if(!empty($_FILES["filmdat_stamp"]["name"]))
                {
                    $target_file1 = $target_dir . basename($_FILES["filmdat_stamp"]["name"]);
                    if (move_uploaded_file($_FILES["filmdat_stamp"]["tmp_name"], $target_file1)) 
                    {

                    }
                    else $ok = false;
                    $target_file1 = substr($target_file1, 3);
                }
                
                //Create YouTube key from link https://www.youtube.com/watch?v=RDqZNLXqTuw, https://youtu.be/scSNjP4ZuaA, the key alone
                $youtube_key = $_POST["youtube_key"];
                if (strpos($youtube_key, 'youtube.com') !== false)
                {
                    $youtube_key = substr($_POST["youtube_key"], 32);
                }
                else if (strpos($youtube_key, 'youtu.be') !== false)
                {
                    $youtube_key = substr($_POST["youtube_key"], 17);
                }

                require_once('funkce.php');
                $page = CreateLink($_POST["nazev"]);

                $filmdat_odkaz = NULL;
                if (!empty($_POST["filmdat_odkaz"])) $filmdat_odkaz = $_POST["filmdat_odkaz"];

                $popisek_videa = str_replace("\n", "</p><p>", $_POST["popis"]);

                if ($ok)
                {
                    Db::query('INSERT INTO `taf_filmy` (`nazev`, `youtube_key`, `popis`, `rok`, `nahledak`, `filmdat_stamp`, `filmdat_odkaz`, `page`)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)', $_POST['nazev'], $youtube_key, $popisek_videa, $_POST['rok'], $target_file, $target_file1, $filmdat_odkaz, $page);
                    $_SESSION["message"] = "Film ".$_POST['nazev']." byl úspěšně registrován.";
                }
                else $_SESSION["message"] = "Při nahrávání filmu nastala chyba. Zkuste to znovu později.";
            } 
            else $_SESSION["message"] = "Prosím vyberte náhledový obrázek.";
        } 
        else $_SESSION["message"] = "Prosím vyplňte popisek videa.";
    } 
    else $_SESSION["message"] = "Prosím vyplňte YouTube odkaz nebo klíč.";
} 
else $_SESSION["message"] = "Prosím vyplňte název filmu.";

Header("Location: index.php?s=film")
?>