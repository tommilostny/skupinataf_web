<?php /* Upload Milník */
SESSION_START();

if (!empty($_POST["datum"]))
{
    if (!empty($_POST["text"]))
    {
        require_once('../connect/db_connect.php');
        Db::query('INSERT INTO `taf_milniky` (`datum`, `text`) VALUES (?, ?)', $_POST['datum'], $_POST['text']);
        $_SESSION["message"] = "Milník ".$_POST['datum']." - ".$_POST['text']." byl úspěšně registrován.";
    }
    else $_SESSION["message"] = "Prosím vyplňte text milníku.";
}
else $_SESSION["message"] = "Prosím vyplňte datum milníku.";

Header("Location: index.php?s=milnik");
?>