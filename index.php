<?php
include 'includes/settings.inc';
include 'includes/header.inc';
include 'includes/sendmail.inc';
include 'includes/passwords.inc';

$ZHAWSendMail = new ZHAWSendMail("sh@schnabulation.ch");

DrawHeaderAndFooter::drawHeader();

echo "
  <header>
  <h1>PHP und MySQL - eine Einführung</h1>
  </header>
    <article>Sobald diese PHP-Seite lädt, wird mittels Klasse ZHAWSendMail ein Mail an
	<a href=\"mailto:sh@schnabulation.ch\">sh@schnabulation.ch</a> geschickt.</article>
";

$ZHAWSendMail->sendMailTo("This is the subject", "I want to tell you something!");

DrawHeaderAndFooter::drawFooter();
?>