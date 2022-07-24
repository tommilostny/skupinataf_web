<?php /* Upload New Password */
SESSION_START();
require_once('../connect/db_connect.php');

if (!empty($_POST["new_password"]))
{
    if ($_POST["old_password"] == Db::queryAll("SELECT `password` FROM `taf_users` WHERE `id` = \"".$_SESSION["id"].'"')[0]["password"])
    {
        if ($_POST["new_password"] == $_POST["new_password_confirm"])
        {
            Db::query('UPDATE `taf_users`
                 SET `password` = "'. $_POST["new_password"] .'"
                 WHERE `id` = '. $_SESSION["id"]);
            $_SESSION["message"] = "Heslo profilu ".$_SESSION["login"]." bylo úspěšně aktualizováno.";
        }
        else $_SESSION["message"] = "Nové heslo se neshoduje s potvrzovacím textovým polem.";
    }
    else $_SESSION["message"] = "Staré heslo není správně.";
}
else $_SESSION["message"] = "Nové heslo nesmí být prázdné.";

Header("Location:index.php?s=edit_profile");
?>