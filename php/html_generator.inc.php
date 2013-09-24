<?php

class htmlGenerator {

  public function generateHeader($pagetitle="") {
    echo "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?> \n";
    echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\"> \n";
    echo "<html xmlns=\"http://www.w3.org/1999/xhtml\"> \n";
    echo "<head> \n";
    echo "<title>".$pagetitle."</title> \n";
    echo "<body>";
  }
  
  public function generateFooter() {
    echo "</body> \n";
    echo "</html>";
  }

}

?>