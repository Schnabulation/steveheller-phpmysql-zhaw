<?php
# starts the session
session_start();

# includes
include "../includes/html_generator.inc.php";
include "../includes/overview_table_generator.inc.php";
include "../../db_connection.inc.php";

# generates the header
$htmlGenerator = new htmlGenerator;
$htmlGenerator->generateHeader("WKM Plan - Übersicht");

# generates the footer
$htmlGenerator->generateFooter();

for ($i = 1; $i <= $_SESSION["amount"]; $i++) {
  echo $_SESSION["player".$i]." ";
  
  # fetches the actual TE for the user and displays it
  $mysqli = new MySQLi($host, $user, $pass, "php_test");
  $r = $mysqli->query("SELECT * FROM user JOIN last_te ON user.id = last_te.uid WHERE Name LIKE \"%".$_SESSION["player".$i]."%\"");
  $array = $r->fetch_array();
  echo "(TE: ".$array["TID"].")<br />";
  
  # generates the overview table
  $overviewTableGenerator = new overviewTableGenerator;
  $overviewTableGenerator->generateTable($array["TID"]);
  

}


?>