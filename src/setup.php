<?php
//Connect to database.
error_reporting(0);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try
{
    $mysqli = new mysqli('localhost', 'root', '');
    $mysqli->select_db('f120826');
}
catch (mysqli_sql_exception $exc)
{
    echo "<h3>Nelze navázat spojení s databazí</h3>$exc";
    exit();
}
error_reporting(E_ALL);
$mysqli->query("SET CHARACTER SET utf8");

//Page environment
include_once('classes/Page.php');

$page = new Page($_GET);

?>