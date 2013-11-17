<?php

http://localhost/kantone/resolver.php?service=kantone&methode=single&id=zh



switch ($_GET["service"]) {
	case 'kantone':
		if (isset($get["id"])) {
			$this->show($get["id"]);
		} else {
			$this->showAll();
		}
		break;

	case 'edit':
		if (isset($get["id"])) {
			$this->edit($get["id"]);
		} else {
				
		}
		break;
	default:
		echo "Please select a method";
}