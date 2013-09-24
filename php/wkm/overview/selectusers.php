<?php
# starts the session
session_start();

# includes the htmlGenerator class
include "../includes/html_generator.inc.php";
include "../../db_connection.inc.php";

# generates the header
$htmlGenerator = new htmlGenerator;
$htmlGenerator->generateHeader("WKM Plan - User auswählen");

# instance for MySQLi
$mysqli = new MySQLi($host, $user, $pass, "php_test");

# perform query
$q = "SELECT Name, Nachname FROM user";
$r = $mysqli->query($q);

# safes the param in the session
if (preg_match("([1-9])",$_POST["amount"])) {
  $_SESSION["amount"] = $_POST["amount"];
  $amount = $_POST["amount"];
  
  echo "Bitte wähle nun die ".$amount." user:<br />";
  echo "<form action=\"registerusers.php\" method=\"post\">";
  
  #displays the registered DB players
  while($array = $r->fetch_array()) {
    $name = $array["Name"];    
    echo "<input name=\"selected[]\" value=\"".$name."\" type=\"checkbox\"> ".$name."<br />";
  }
  echo "<input value=\"OK\" type=\"submit\">";      
}
else {
  echo "Du hast keine Zahl zwischen 1 und 9 eingegeben. Bitte geh <a href=\"../\" target=\"_self\">zurück</a>.";
}
# generates the footer
$htmlGenerator->generateFooter();

?>