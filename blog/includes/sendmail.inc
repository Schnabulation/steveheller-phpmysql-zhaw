<?php
include 'phpmailer/class.phpmailer.php';

class ZHAWSendMail {

	private $email;  // the email address
	private $mail;  // the PHPMailer class
	
	function __construct() {
		
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
	}
	
	public function sendMailTo($email, $subject, $body) {
		$this->mail->Subject = $subject;
		$this->mail->Body = $body;
		$this->mail->addAddress($email); 
		
		if(!$this->mail->send()) {
			echo 'Shait, the crapper did not work...';
			echo 'Mailer Error: ' . $this->mail->ErrorInfo;
			exit;
		}
		echo 'Mail erfolgreich versendet';
	}
}

?>