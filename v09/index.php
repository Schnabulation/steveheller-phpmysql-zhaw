<?php

/*
 * Author:
 * - Steve Heller
 * - Patrice Keusch
 * - Rajeevan Rabeendran
 * - Mathias Weigert
 */

require_once 'mvc/model.php';
require_once 'mvc/controller.php';
require_once 'mvc/view.php';

$controller = new Controller($_POST,$_GET);

?>
