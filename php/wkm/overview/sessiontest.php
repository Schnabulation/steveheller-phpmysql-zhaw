<?php
session_start();

for ($i = 1; $i <= 10; $i++) {
  echo $_SESSION["player".$i]."<br />";
}




?>