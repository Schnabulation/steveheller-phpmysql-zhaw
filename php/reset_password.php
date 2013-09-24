<?php

echo "<html>\n";
echo "<head>\n";
echo "<title>Reset passwords</title>\n";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"reset_password.css\">";
echo "<head>\n";
echo "<body>\n";
echo "<div id=\"body\"><div id=\"content\">";

include "db_connection.inc.php";
$hosts = array("marvinB", "marvinC", "marvinD", "marvinE");

$enable_file = "ENABLE";

function check_file_age($file) { //returns true if the file is younger than 3 minutes otherwise it returns false
  $enable_filechange = filemtime($file);
  $correct_time = time()-180;
  
  if ($enable_filechange > $correct_time) {
    return true;    
  }
  
  else {
    return false;
  }
}

if (!check_file_age($enable_file)) {
  die("Please place the file <b>".$enable_file."</b> into the application directory to enable the password tool.");
}

if (!isset($_POST["step"])) {
  echo "Bitte wähle den gewünschten Host aus:<br />";
  echo "<form id=\"form_css\" action=\"reset_password.php\" method=\"POST\">";
  echo "<select id=\"select_css\" name=\"host\">";
  
  foreach ($hosts as $host) {
    echo "<option value=\"".$host."\">".$host."</option>\n";
  }    

  echo "</select>";
  echo "<input name=\"step\" type=\"hidden\" value=\"1\">";
  echo "<input id=\"submit_css\" type=\"submit\" value=\">\">";
}

if ($_POST["step"] == 1) {
  $mysqli = new mysqli($_POST["host"], $user, $pass);
  $db_list = $mysqli->query("SHOW DATABASES");
  
  echo "Bitte wähle die gewünschte Datenbank aus:<br />";
  echo "<form id=\"form_css\" action=\"reset_password.php\" method=\"POST\">";
  echo "<select id=\"select_css\" name=\"db\">";
  while ($array = $db_list->fetch_array()) {
  
    if (preg_match("(t3_)", $array["Database"])) {
      echo "<option value=\"".$array["Database"]."\">".$array["Database"]."</option>\n";
    }
    
  }
  echo "</select>";
  echo "<input name=\"step\" type=\"hidden\" value=\"2\">";
  echo "<input name=\"host\" type=\"hidden\" value=\"".$_POST["host"]."\">";
  echo "<input id=\"submit_css\" type=\"submit\" value=\">\">";

}

if ($_POST["step"] == 2) {
  echo "Bitte wähle den zu ändernden User in <br />der Datenbank <b>".$_POST["db"]."</b> aus:<br />";
  
  $mysqli = new mysqli($_POST["host"], $user, $pass, $_POST["db"]);
  $users = $mysqli->query("SELECT * FROM be_users WHERE deleted = 0");
  
  
  echo "<form id=\"form_css\" action=\"reset_password.php\" method=\"POST\">";
  echo "<select id=\"select_css\" name=\"user\">";
  
  while ($array = $users->fetch_array()) {
  
    echo "<option value=\"".$array["username"]."\">".$array["username"]."</option>\n";
  
  }
  
  echo "</select>";
  echo "<input name=\"step\" type=\"hidden\" value=\"3\">";
  echo "<input name=\"db\" type=\"hidden\" value=\"".$_POST["db"]."\">";
  echo "<input name=\"host\" type=\"hidden\" value=\"".$_POST["host"]."\">";
  echo "<input id=\"submit_css\" type=\"submit\" value=\">\">";
  
}

if ($_POST["step"] == 3) {
  echo "Bitte gib das neue Password für den User <b>".$_POST["user"]."</b> ein:<br />";

  echo "<form id=\"form_css\" action=\"reset_password.php\" method=\"POST\">";
  echo "<input id=\"text_css\" type=\"text\" name=\"password\">";
  echo "<input name=\"step\" type=\"hidden\" value=\"4\">";
  echo "<input name=\"user\" type=\"hidden\" value=\"".$_POST["user"]."\">";
  echo "<input name=\"db\" type=\"hidden\" value=\"".$_POST["db"]."\">";
  echo "<input name=\"host\" type=\"hidden\" value=\"".$_POST["host"]."\">";
  echo "<input id=\"submit_css\" type=\"submit\" value=\">\">";
}

if ($_POST["step"] == 4) {
  $mysqli = new MySQLi($_POST["host"], $user, $pass, $_POST["db"]);
  $result = $mysqli->query("UPDATE be_users SET password = \"".md5($_POST["password"])."\" WHERE username LIKE \"".$_POST["user"]."\"");
  
  echo "Das Password des Users <b>".$_POST["user"]."</b> wurde geändert.<br />";
  
  $handler = fOpen("users.log", "a+");
  fWrite($handler, date("d.m.y - G:i")." => ".$_SERVER["REMOTE_ADDR"]." => ".$_POST["db"]." => ".$_POST["user"]."\r\n");
  fClose($handler);
  
  mail("steve.heller@cs2.ch", "Passwordchange on idoru", date("d.m.y - G:i")." => ".$_SERVER["REMOTE_ADDR"]." => ".$_POST["db"]." => ".$_POST["user"]);
  
  
}

echo "</div></div>";
echo "</body>";

?>