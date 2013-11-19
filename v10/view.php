<?php

require_once "includes/header.inc.php";

class View {
	
	private $errorShown = 0;
	
	public function __construct() {
		DrawHeaderAndFooter::drawHeader("JSON OUTPUT");
	}
	
	public function printJson($array) {
		echo json_encode($array);
	}
	
	public function printXml($array) {
		// initializing or creating array
		$student_info = array($array);
		
		// creating object of SimpleXMLElement
		$xml_student_info = new SimpleXMLElement("<?xml version=\"1.0\"?><kantone></kantone>");
		
		// function call to convert array to xml
		$this->array_to_xml($student_info,$xml_student_info);
		
		//saving generated xml file
		echo $xml_student_info->asXML();
	}
	
	public function printErrorText($error) {
		if ($this->errorShown == 0) {
			echo $error;
		}
		$this->errorShown = 1; // Only shows the error once!
		
	}
	
	private function array_to_xml($student_info, &$xml_student_info) {
		foreach($student_info as $key => $value) {
			if(is_array($value)) {
				if(!is_numeric($key)){
					$subnode = $xml_student_info->addChild("$key");
					$this->array_to_xml($value, $subnode);
				}
				else{
					$subnode = $xml_student_info->addChild("item$key");
					$this->array_to_xml($value, $subnode);
				}
			}
			else {
				$xml_student_info->addChild("$key","$value");
			}
		}
	}
	
}

?>