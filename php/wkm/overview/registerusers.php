<?php
# starts the session
session_start();

# includes
include "../includes/html_generator.inc.php";

# generates the header
$htmlGenerator = new htmlGenerator;
$htmlGenerator->generateHeader("WKM Plan - User auswählen");

# flushes the session
for ($i = 1; $i <= 10; $i++) {
  unset($_SESSION["player".$i]);
}

# sets the players in the session
if (count($_POST["selected"]) == $_SESSION["amount"]) {
  for ($i = 1; $i <= $_SESSION["amount"]; $i++) {
    $_SESSION["player".$i] = $_POST["selected"][$i-1];
  }
  echo "Du hast ".$_SESSION["amount"]." Trainierende ausgewählt.<br />
       Die User wurden gespeichert. Du kannst nun trainieren. Du wirst in 3 Sekunden zur Übersicht weitergeleitet.";
  echo "<meta http-equiv=\"refresh\" content=\"3; URL=index.php\">";       
}

else {
  echo "Du hast zuviele Leute ausgewählt. Bitte geh <a href=\"../\" target=\"_self\">zurück</a>.";
}

# generates the footer
$htmlGenerator->generateFooter();


?>