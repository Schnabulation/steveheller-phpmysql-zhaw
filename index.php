<?php
session_start();

include 'includes/passwords.inc';
include 'includes/settings.inc';
include 'includes/header.inc';
include 'includes/sendmail.inc';

$ZHAWSendMail = new ZHAWSendMail();

DrawHeaderAndFooter::drawHeader("PHP und MySQL - eine Einführung");

echo "
  <header>
  <h1>PHP und MySQL - eine Einführung</h1>
  </header>
    <article>Sobald diese PHP-Seite lädt, wird mittels Klasse ZHAWSendMail ein Mail an
	<a href=\"mailto:sh@schnabulation.ch\">sh@schnabulation.ch</a> geschickt.</article>

<form action=\"#\" method=\"post\">
<input type=\"hidden\" name=\"gesendet\">
<input type=\"submit\" value=\"Mail versenden\">
</form>
<br /><br />
<h2>Direkte Weiterleitung</h2>				
<form action = \"https://duckduckgo.com/\" method=\"get\">
<input type = \"text\" name = \"q\">
<input type = \"submit\" value = \"Suche starten\">
</form>
<br /><br />
<h2>Via Header</h2>
<form action = \"#\" method=\"post\">
<input type = \"text\" name = \"q\">
<input type = \"submit\" value = \"Suche starten\">
</form>
";

if (isset($_POST["q"])) {
	header("Location: https://duckduckgo.com/?q=".$_POST["q"]);
	
}

if (isset($_POST["gesendet"])) {
	$ZHAWSendMail->sendMailTo("steve.heller@schnabulation.ch", "ZHAW // PHP und MySQL", "Das E-Mail wurde erfolgreich versendet!");
}

DrawHeaderAndFooter::drawFooter();
?>