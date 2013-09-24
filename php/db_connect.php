<html>
<head>
<title>PHP learnings by Steve</title>
</head>
<body>
<?php
include "mysql_connections.inc.php";
include "db_connection.inc.php";

$server = $host;
$db = "php_test";

$connector = new mysql_connections;
$connector->connect_db($server,$user,$pass,$db);
?>

<form action="db_connect.php" method="post">
Alter: <input name="alter" type="text" size="2"><input type="submit" value=">">
</form>

<?php
if ($_POST["alter"] != NULL) {
$query = "INSERT INTO test VALUES (NULL, ".$_POST["alter"].")";
$result = $connector->sendQuery($query);
echo "Wurde eingefügt!";
}
?>


</body>
</html>