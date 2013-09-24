<?php

include "berechner.inc";

$zahl1 = $_POST["zahl1"];
$zahl2 = $_POST["zahl2"];

$berechner = new Berechner;
$berechner->addieren($zahl1,$zahl2);

?>
