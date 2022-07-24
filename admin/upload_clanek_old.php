<style>
    body{
        font-family: 'Segoe UI', sans-serif;
    }
    h2{
        font-weight: lighter;
    }
</style>

<?php /* Upload Článek */

require_once('../connect/db_connect.php');
error_reporting(0);

$target_dir = "../img/clanky/";
$target_file = $target_dir . basename($_FILES["nahledak"]["name"]);
$target_dir1 = "../podstranky/clanky/";
$target_file1 = $target_dir1 . basename($_FILES["odkaz"]["name"]);


if (move_uploaded_file($_FILES["nahledak"]["tmp_name"], $target_file)) {
    echo "Soubor <em>". basename( $_FILES["nahledak"]["name"]). "</em> byl úspěšně nahrán.<br>";
} else {
    echo "Sorry, there was an error uploading ". basename($_FILES["nahledak"]["name"]). ".<br>";
}
$target_file = substr($target_file, 3);

if (move_uploaded_file($_FILES["odkaz"]["tmp_name"], $target_file1)) {
    echo "Soubor <em>". basename( $_FILES["odkaz"]["name"]). "</em> byl úspěšně nahrán.<br>";
} else {
    echo "Sorry, there was an error uploading ". basename($_FILES["odkaz"]["name"]). ".<br>";
}
$target_file1 = substr($target_file1, 3);

Db::query('INSERT INTO `taf_clanky` (`nazev`, `nahledak`, `odkaz`)
                        VALUES (?, ?, ?)', $_POST['nazev'], $target_file, substr($target_file1, 0, -5));
             echo "<h2>Článek <strong>".$_POST['nazev']."</strong> byl úspěšně registrován.</h2>";
?>
<a href="index.php#clanky">zpět</a><br><br>