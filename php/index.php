<?php 
session_start();
if($_GET["Name"] != NULL) {
setcookie("WhoAmI",$_GET["Name"]);
}

include "db_connection.inc.php";

?>

<html>
<head>
<title>
<?php echo "PHP testsite, it's: ".date("H:i:s"); ?>
</title>
<script src="javascript.js" type="text/javascript"></script>
</head>
<body>

<h2> Formulare auslesen </h2>

<form action="test.php" method="post">
<input type="text" size="4" name="zahl1"> +
<input type="text" size="4" name="zahl2">
<input type="submit" value="=">
</form>

<h2> If/Else </h2>

<?php 
if ("Steve" == "Steve")
{
echo "wahr";
}
?>

<h2>  Files schreiben </h2>

<?php

$file = fopen("steve.txt","a+");
echo "<form action=\"#\" method=\"post\">
<input type=\"text\" size=\"20\" name=\"name\">
<input type=\"submit\" value=\"Absenden\">
</form>";

if ($_POST["name"] != "")
{
$name = $_POST["name"];
echo "Name ist jetzt ",$name,"<br>";
echo "Dies wurde in die Datei steve.txt geschrieben";
fwrite($file,$name);
}

fclose($file);
?>

<h2> Datenbankconnection </h2>

<?php

include "mysql_connections.inc.php";

$server = $host;
$db = "php_test";

$verbindung = new mysql_connections;
$verbindung->connect_db($server,$user,$pass,$db);

if($_POST["id"]==NULL) {
echo "<form action=\"#\" method=\"post\">";
echo "Gewünschte ID eingeben:<br>";
echo "<input type=\"text\" size=\"1\" name=\"id\">";
echo "<input type=\"submit\" value=\"OK\">";         
echo "</form>";
}
else {
$id = $_POST["id"];

$abfrage = "SELECT * FROM user WHERE id = ".$id;
$ergebnis = $verbindung->sendquery($abfrage);
//$counter = 1;

//foreach ($array = mysql_fetch_array($ergebnis) as $key => $row) {
  //echo "Objekt: ",$counter,": ",$row[$key],"<br>";
  //$counter++;
  //echo "Key: ",$key,"<br>";
  //echo "Array: ",$row,"<br>";
//}

while($array = mysql_fetch_array($ergebnis)) {
  echo $array["Name"]," ",$array["Nachname"],"<br>";
}

}
?>

<h2> In DB schreiben </h2>

<?php

echo "Neuen User in Datenbank schreiben:";
echo "<form action=\"#\" method=\"post\">
<input type=\"text\" size=\"20\" name=\"name_db\"><br>
<input type=\"text\" size=\"20\" name=\"nachname_db\">
<input type=\"submit\" value=\"Absenden\">
</form>";

if ($_POST["name_db"] != "" && $_POST["nachname_db"] != "")
{
$name = $_POST["name_db"];
$nachname = $_POST["nachname_db"];
echo "Du bist ",$name," ",$nachname,"<br>";
$write_to_db = "INSERT INTO user VALUES(NULL,'$name','$nachname')";
$verbindung->sendquery($write_to_db);
echo "Und das steht jetzt auch in der DB";
}

?>

<a href="loeschen.php" target="top">User löschen</a>

<h2>.=</h2>

<?php
echo "Variable 1: ",$v1="Steve","<br>";
echo "Variable 2: ",$v2="Wagner","<br>";
echo "Variable 3 (\$v3 = \$v1.\$v2): ",$v3 = $v1.$v2,"<br>";

$v3 .= "etwas anhängen";

echo "Variable 3 neu: ",$v3;



?>

<br><br><br>
<i>
echo "Variable 1: ",$v1="Steve";<br>    
echo "Variable 2: ",$v2="Wagner";   <br>
echo "Variable 3 (\$v3 = \$v1.\$v2): ",$v3 = $v1.$v2;<br>
                                                         <br>
$v3 .= "etwas anhängen";                                     <br>
                                                                 <br>
echo "Variable 3 neu: ",$v3;
</i>

<h2>Session / Cookies</h2>
<?php
                     
$_SESSION["name"] = "Steve";

echo "\$_SESSION[\"name\"] ist jetzt ";
echo $_SESSION["name"];

echo "<br><br><a href=\"session_test.php\" target=\"self\">go here</a><br>";

if ($_COOKIE["WhoAmI"] != NULL) {
echo "Und das Cookie hat nun den Wert: ".$_COOKIE["WhoAmI"];
}
else {
echo "Setze das Cookie mit GET-Parameter \"Name\"<br>";
echo "Oder hier:";
echo "<form action=\"#\" method=\"get\">
<input type=\"text\" size=\"20\" name=\"Name\">
<input type=\"submit\" value=\"GO\">
</form>";
}

?>

<h2> Objektorientiert </h2>

<?php

echo "Let's define here some new class<br>";

class rechner 
{
  
  private $resultat = NULL;

  public function addition($zahl1, $zahl2)
  {
    $this->resultat = NULL;
    $this->resultat = $zahl1 + $zahl2;
    return $this->resultat;
  }
  
  public function subtraction($zahl1, $zahl2)
  {
    $this->resultat = NULL;
    $this->resultat = $zahl1 - $zahl2;
    return $this->resultat;
  }

}

echo "Let's use that class: ";

$rechner = new rechner;
echo $rechner->subtraction(2,4) + $rechner->addition(20,30);

?>

<h2>strftime</h2>
<?php
echo strftime("Wir haben heute %A.");

echo "<h2>mysql_real_escape_string</h2>";

$query = "Test \"";

echo mysql_real_escape_string($query);
echo "<br />".$query;

?>

<h2>javascript baby</h2>

<a onclick="fRechnen(document.calc.zahl1.value, document.calc.zahl2.value, document.calc.resultat)">click me</a>

<form name="calc" action="" method="post">
<input type="text" size="4" name="zahl1"> +
<input type="text" size="4" name="zahl2">
<input type="submit" onclick="fRechnen(document.calc.zahl1.value, document.calc.zahl2.value, document.calc.resultat.value)" value="=">
<input type="text" size="4" name="resultat">
</form>

</body>
</html>