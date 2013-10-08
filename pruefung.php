<?php
session_start();

echo $_SESSION["Name"];

#$_SESSION["Name"] = Steve;



session_unset();

?>