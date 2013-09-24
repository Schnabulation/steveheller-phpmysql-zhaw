<?php
class mysql_connections {

  private $connection = NULL;

  public function connect_db($server,$user,$pass,$db) {
    $this->connection = mysql_connect($server,$user,$pass) or die("Keine Verbindung möglich");
    mysql_select_db($db,$this->connection) or die("Datenbank nicht vorhanden");
  }
  
  public function sendQuery($query) {
    return mysql_query($query,$this->connection);
  }
  
  public function returnConnection() {
    return $this->connection;
  }
  
}
?>