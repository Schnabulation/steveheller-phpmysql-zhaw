<?php
require_once 'rdgp.inc.php';

$newRow = new Post();
$newRow->setCreated(1383073521);
$newRow->setTitle("Steve Heller");
$newRow->setContent("I am the man.");
$newRow->insert();
$newRow->setContent("No, you are not.");
$newRow->update();
// $newRow->findByID(23);
// $newRow->delete();
?>