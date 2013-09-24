<?php

# includes the htmlGenerator class
include "includes/html_generator.inc.php";

# generates the header
$htmlGenerator = new htmlGenerator;
$htmlGenerator->generateHeader("WKM Plan");

# asks for the amount of players
echo "<h2>Bitte die Anzahl an Trainierenden eingeben:</h2>\n";

echo "<form action=\"overview/selectusers.php\" method=\"post\">
<input type=\"text\" size=\"1\" maxlength=\"1\" value=\"1\" name=\"amount\">
<input type=\"submit\" value=\"OK\">
</form>";

# generates the footer
$htmlGenerator->generateFooter();

?>