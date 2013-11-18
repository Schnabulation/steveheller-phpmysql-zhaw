<?php

require_once "kanton.php";

$kanton = new Kanton();
$error = 0;


switch ($_GET["service"]) {
	case 'kantone':
		switch ($_GET["methode"]) {
			case 'single':
				print_r($kanton->getKantonByKennzeichen($_GET["id"]));
				break;
				
			case 'list':
				print_r($kanton->getKantonArray());
				break;
				
			default:
				echo "Bitte valide URL eintippen";
				$error = 1;
				break;
		}
		break;
		
		default:
			if ($error == 0) {
				echo "Bitte valide URL eintippen";
			}
			break;
}

?>