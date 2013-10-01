<?php
include 'includes/settings.inc';
include 'includes/header.inc';
DrawHeaderAndFooter::drawHeader();


function kosten($anzahl, $preis = 45, $waehrung = "CHF") {
	$rueckgabe = array();
	$rueckgabe["kosten"] = $anzahl * $preis;
	$rueckgabe["text"] = $waehrung;
	return $rueckgabe;
}


$var = kosten(7, 39.99, "Dollar");
echo $var["kosten"] . " " . $var["text"] . "<br />";
$var = kosten(10);
echo $var["kosten"] . " " . $var["text"] . "<br />";
$var =  kosten(15,29);
echo $var["kosten"] . " " . $var["text"] . "<br />";

DrawHeaderAndFooter::drawFooter();
?>