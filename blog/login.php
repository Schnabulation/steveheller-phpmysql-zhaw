<?php
require_once 'includes/passwords.inc';
require_once 'includes/settings.inc';
require_once 'includes/header.inc';

define("Benutzername", "Steve");
define("Passwort", "PHPistCool");

if (isset($_POST["username"]) && isset($_POST["password"])) {
	if ($_POST["username"] == Benutzername && $_POST["password"] == Passwort) {
		setcookie("login",true);
	}
}

DrawHeaderAndFooter::drawHeader("PHP Zwischenprüfung - Blog");
?>
<h1>Login</h1>


<?php
if (!isset($_POST["username"]) && !isset($_POST["password"])) {
	echo "
		<p style=\"margin-bottom: 20px;\">Du bist momentan noch nicht eingeloggt. Log dich bitte mit deinem Benuter ein.</p>
		<form enctype=\"multipart/form-data\" class=\"form\" action=\"#\" method=\"POST\">
		<input type=\"text\" name=\"username\" id=\"name\" placeholder=\"Steve\" required />
		<input type=\"password\" name=\"password\" id=\"pass\" placeholder=\"Password\" required />
		<input type=\"submit\" value=\"Login\" />";

} else {
if ($_POST["username"] == Benutzername && $_POST["password"] == Passwort) {
echo "Login erfolgreich";
} else {
echo "Benutzername oder Passwort stimmt nicht. <a href=\"login.php\">Zurück</a>";
}
}



DrawHeaderAndFooter::drawFooter();
?>