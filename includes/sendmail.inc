<?php
include 'phpmailer/class.phpmailer.php';

class ZHAWSendMail {

	private $email;  // the email address
	private $mail;  // the PHPMailer class
	
	function __construct($email) {
		
		$this->mail = new PHPMailer;
		$this->mail->isSMTP();                                      // Set mailer to use SMTP
		$this->mail->Host = 'asmtp.mail.hostpoint.ch';  // Specify main and backup server
		$this->mail->SMTPAuth = true;                               // Enable SMTP authentication
		$this->mail->Username = 'steve.heller@schnabulation.ch';                            // SMTP username
		$this->mail->Password = smtpPassword;                           // SMTP password
		$this->mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
		
		$this->mail->From = 'steve.heller@schnabulation.ch';
		$this->mail->FromName = 'Steve Heller';
		
		$this->mail->WordWrap = 50;                                 // Set word wrap to 50 characters
		
		$this->setDestination($email);
	}
	
	public function sendMailTo($subject, $body) {
		$this->mail->Subject = $subject;
		$this->mail->Body = $body;
		
		if(!$this->mail->send()) {
			echo 'Shait, the crapper did not work...';
			echo 'Mailer Error: ' . $this->mail->ErrorInfo;
			exit;
		}
		echo 'Mail erfolgreich gesendet';
	}
	
	public function setDestination($email) {
		$this->mail->addAddress($email);  // Add a recipient
	}
}

?>