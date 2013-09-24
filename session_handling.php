<?php
session_start();

include 'includes/settings.inc';
include 'includes/header.inc';

DrawHeaderAndFooter::drawHeader();

$mysqli = new mysqli("localhost", "root", "virtual", "Benutzer");

/* check connection */
if ($mysqli->connect_errno) {
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();

}

if (isset($_POST["Name"])) {
	$mysqli->query("INSERT INTO `UserAlter` (`Name`, `Alter`) VALUES ('".$_POST["Name"]."', ".$_POST["Alter"].")");
}

echo "
		<header>
		<h1>PHP und MySQL - Sessionhandling</h1>
		</header>
		<form action = \"#\" method=\"post\">
		Bitte gib deinen Namen ein:<br />
		<input type = \"text\" name = \"Name\"><br />
		Bitte gib dein Alter ein:<br />
		<input type = \"text\" name = \"Alter\"><br />
		<input type = \"submit\" value = \"Eintragen\">
		</form>
		";

if ($result = $mysqli->query("SELECT * FROM UserAlter")) {
	$finfo = $result->fetch_fields();
  while ($row = $result -> fetch_assoc()) 
  {
    echo $row["Name"];
    echo " ist ";
  	echo $row["Alter"];
  	echo "<br />";
  }
	$result->close();
}


DrawHeaderAndFooter::drawFooter();
$mysqli->close();
?>