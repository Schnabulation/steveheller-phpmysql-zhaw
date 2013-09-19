<?php

class ZHAWSendMail {
	
	private $email;
	
	function __construct($email) {
		$this->setDestination($email);
	}
	
	public function sendMailToxobe() {
		if ($return = mail($this->email, "Testmail", "Lorem ipsum")) {
			echo "Seems to have worked - yeeehaaaa!";
		} else {
			echo "Shait, the crapper did not work...";
		}	
	}
	
	public function setDestination($email) {
		$this->email = $email;
	}
	
	public function getDestination() {
		return $this->email;
	}
}

?>