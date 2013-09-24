<?php
session_start();

$session_id = session_id();

include "html_generator.inc.php";

$pagetitle = "Login";

$html = new htmlGenerator;
$html->generateHeader($pagetitle);

?>

<h1>Login test</h1>

<form action="login.php" method="post">
Username: <input type="text" size="12" name="username"><br>
Password: <input type="password" size="12" name="password"><br>
<input type="submit" value="Login">
</form>


<?php






$html->generateFooter();
?>