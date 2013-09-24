<?php
session_start();

include "html_generator.inc.php";
include "mysql_connections.inc.php";
include "db_connection.inc.php";

$pagetitle = "Loginversuch";

$html = new htmlGenerator;
$html->generateHeader($pagetitle);

$connector = new mysql_connections;

$server = $host;
$db = "php_test";

$connector->connect_db($server,$user,$pass,$db);

if ($_POST["username"] != NULL && $_POST["password"] != NULL) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT Password FROM logins WHERE Username LIKE \"".$username."\"";
    $result = $connector->sendQuery($query);
    
    $resultArray = mysql_fetch_array($result);
    if ($password == $resultArray["Password"]) {
        $setcookie = true;
        echo "Passwort korrekt!<br>Cookie gesetzt!";
    } else {
        echo "Passwort nicht korrekt!";
    }
    




} else {
    echo "Werte nicht korrekt gesendet!";
}

$html->generateFooter($pagetitle);

?>
