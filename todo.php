<?php
include 'includes/passwords.inc';
include 'includes/settings.inc';
include 'includes/header.inc';
include 'includes/sendmail.inc';

$connection = new PDO('mysql:host=localhost;dbname=todo_list', user, pass);

if (isset($_POST["Name"])) {
	if (strcmp($_POST["Name"],"") != 0) {
		$connection->exec("INSERT INTO entries (Name, Done) VALUES ('".$_POST["Name"]."', '0')");
	}
}

DrawHeaderAndFooter::drawHeader("Todo-Liste");
?>

  <header>
  <h1>Todo - Liste</h1>
  </header>
  <span style="font-weight:bold;">Zu erledigen:</span>
  <br />

<?php
$retrieveList = "SELECT * FROM entries";
    foreach ($connection->query($retrieveList) as $row) {
		if ($row["Done"] == 0) {
			echo ". ".$row['Name'];
			echo "<br />";
		} 
    }
?>

<br /><br />
  <span style="font-weight:bold;">Erledigt:</span>
  <br />

  <?php
$retrieveList = "SELECT * FROM entries";
    foreach ($connection->query($retrieveList) as $row) {
		if ($row["Done"] == 1) {
			echo ". ".$row['Name'];
			echo "<br />";
		} 
    }
?>
<br /><br />
<form action="#" method="post">
<input name="Name" type="text">
<input type="submit" value="Erfassen">
</form>


<?php
DrawHeaderAndFooter::drawFooter();
?>