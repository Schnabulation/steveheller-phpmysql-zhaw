<?php
session_start();

echo "\$_SESSION[\"name\"] ist jetzt ";
echo $_SESSION["name"];

session_destroy();

?>