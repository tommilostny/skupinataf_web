<?php
SESSION_START();
require_once('../connect/db_connect.php');

Db::query('INSERT INTO `taf_clanek_kapitoly` (`nadpis`, `id_clanek`)
                        VALUES (?, ?)', $_POST['nadpis'], $_POST['id_clanek']);

$_SESSION["message"] = "Kapitola " . $_POST['nadpis'] . " byla úspěšně vytvořena.";
Header("Location: index.php?s=edit_clanek&id=".$_POST["id_clanek"]);
?>