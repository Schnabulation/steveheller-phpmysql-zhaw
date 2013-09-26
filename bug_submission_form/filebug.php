<?php
  require_once('recaptchalib.php');
  $privatekey = "6LewAugSAAAAANIvTJa8bAMOtgjLn666cwc7IOaP";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
         "(reCAPTCHA said: " . $resp->error . ")");
  } else {
   echo "Captcha entered correctly"; // Your code here to handle a successful verification
  }
  
  
  $uploaddir = '/var/www/bug_submission_form/';
  $uploadfile = $uploaddir.basename($_FILES['userfile']['name']);
  print "<pre>";
  if  (move_uploaded_file($_FILES['userfile']['tmp_name'],
  		$uploadfile)) {
  	print "File is valid, and was successfully uploaded.";
  	print "Here's some more debugging info:\n";
  	print_r($_FILES);
  } else {
  	print "Possible file upload attack! Here's some debugging
info:\n";
  	print_r($_FILES);
  }
  print "</pre>";
  ?>