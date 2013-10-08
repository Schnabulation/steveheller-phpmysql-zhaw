<?php
require_once 'includes/settings.inc';
require_once 'includes/header.inc';

DrawHeaderAndFooter::drawHeader("PHP Zwischenprüfung - Blog");
?>

<h1>Blog</h1>

<?php
if (isset($_COOKIE["login"])) {
	echo "Du bist eingeloggt<br />";
	echo "<a href=\"create.php\">Beitrag erstellen</a>";
} else {
	echo "Du musst dich erst <a href=\"login.php\">hier</a> einloggen";
}
	echo "<p style=\"margin-bottom:50px;\">";

$path = getcwd()."/posts/";

if ($dh = opendir($path)) {
	while (($file = readdir($dh)) !== false) {
		if (strcmp (substr($file,0,1),".") != 0) {
		$handle = fopen($path . $file, "r");
		$inhalt = explode(";",fgets($handle));
		echo "<h2>".$inhalt[0] . "</h2>" . $inhalt[1] . "<br /><br /><br />";
		fclose ($handle);
		}
	}
	closedir($dh);
}

DrawHeaderAndFooter::drawFooter();
?>