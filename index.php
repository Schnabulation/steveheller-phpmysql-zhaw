<?php
include 'includes/settings.inc';
include 'includes/header.inc';
include 'includes/sendmail.inc';

$ZHAWSendMail = new ZHAWSendMail("sh@schnabulation.ch");

DrawHeaderAndFooter::drawHeader();

echo "
  <header>
  <h1>PHP und MySQL - eine Einführung</h1>
  </header>
    <article>Sobald diese PHP-Seite lädt, wird mittels Klasse ZHAWSendMail ein Mail an
	<a href=\"mailto:" . $ZHAWSendMail->getDestination() . "\">" . $ZHAWSendMail->getDestination() . "</a> geschickt.</article>
";

$ZHAWSendMail->sendMailToxobe();

DrawHeaderAndFooter::drawFooter();
?>