<?php

require_once "kanton.php";
require_once "view.php";

$kanton = new Kanton();
$view = new View();


switch ($_GET["service"]) {
	case 'kantone':
		switch ($_GET["methode"]) {
			case 'single':
				$view->printJson($kanton->getKantonByKennzeichen($_GET["id"]));
				break;
				
			case 'list':
				$view->printJson($kanton->getKantonArray());
				break;
				
			default:
			$view->printErrorText("Bitte den Parameter \"Methode\" korrekt angeben");
			break;
		}
		break;
		
		default:
			$view->printErrorText("Bitte den Parameter \"Service\" korrekt angeben");
			break;
}

?>