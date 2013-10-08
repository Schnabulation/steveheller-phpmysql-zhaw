<?php
require_once 'includes/settings.inc';
require_once 'includes/header.inc';

if (isset($_POST["title"]) && isset($_POST["inhalt"])) {
	$file = fopen(getcwd()."/posts/".date("Yjd-His").".txt","a+");
	$towrite = $_POST["title"] . ";" . $_POST["inhalt"];
	fwrite($file,$towrite);
	fclose($file);
}

DrawHeaderAndFooter::drawHeader("PHP Zwischenprüfung - Blog");
?>
<h1>Beitrag erstellen</h1>

<?php

	if (isset($_COOKIE["login"])) {
	echo "
		<form enctype=\"multipart/form-data\" class=\"form\" action=\"#\" method=\"POST\">
		<input type=\"text\" name=\"title\" id=\"title\" placeholder=\"Titel\" required /><br /><br />
		<textarea name=\"inhalt\" placeholder=\"Inhalt des Beitrags\" required /></textarea><br /><br />
		<input type=\"submit\" value=\"Beitrag erstellen\" />";
} else {
echo "Du musst dich erst <a href=\"login.php\">hier</a> einloggen";
}



DrawHeaderAndFooter::drawFooter();
?>