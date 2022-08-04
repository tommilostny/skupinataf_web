<?php

//Obrázky v článku
$myFile = $_FILES['my_file'];
$fileCount = count($myFile["name"]);

for ($i = 0; $i < $fileCount; $i++) 
{
    if (move_uploaded_file($myFile["tmp_name"][$i], "../img/clanky/" . basename($myFile["name"][$i]))) {
        echo "Soubor <em>". basename($myFile["name"][$i]). "</em> byl úspěšně nahrán.<br>";
    } else {
        echo "Sorry, there was an error uploading ". basename($myFile["name"][$i]). ".<br>";
    }
}

?>

<a href="index.php#clanky">zpět</a>