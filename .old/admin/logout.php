<?php
SESSION_START();
SESSION_UNSET();
// Unset all of the session variables.
SESSION_DESTROY();
// Finally, destroy the session.
SESSION_START();
$_SESSION["message"] = "Byl jste úspěšně odhlášen.";
Header("Location: " . $_SERVER["HTTP_REFERER"]);
?>