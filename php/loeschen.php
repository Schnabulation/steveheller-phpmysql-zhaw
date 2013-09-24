<?php

include "mysql_connections.inc.php";
include "db_connection.inc.php";

$server = $host;
$db = "php_test";

$mysql_connections = new mysql_connections;
$mysql_connections->connect_db($server,$user,$pass,$db);
?>

<form action="loeschen.php" method="post">
Suche nach:<br>
<input type="text" size="20" name="Vorname" value="<?php echo $_POST["Vorname"]; ?>">
<input type="submit" value="Suchen">
</form>

<?php

$zu_suchen = $_POST["Vorname"];

if($zu_suchen != NULL) {
echo "Es wird nun nach <i>".$zu_suchen."</i> gesucht:<br><br>";


$query = "SELECT * FROM user WHERE Name LIKE \"%".$zu_suchen."%\" OR Nachname LIKE \"%".$zu_suchen."%\"";

$resultat = $mysql_connections->sendQuery($query);

echo "Record durch Klick löschen:<br>";
while($array = mysql_fetch_array($resultat))
{
  echo "<a href=\"loeschen.php?id=".$array["ID"]."\" target=\"top\">".$array["Name"]." ".$array["Nachname"]."<br></a>";
}
}

if($_GET["id"] != NULL) {

  $zu_loeschen = $_GET["id"];
  
  $query = "DELETE FROM user WHERE ID = ".$zu_loeschen;
  $mysql_connections->sendQuery($query);
  
  echo "Der User wurde gelöscht";

}




















?>