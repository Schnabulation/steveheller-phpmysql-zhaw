<?php
class Berechner {
  private $resultat = NULL;
  
  public function addieren($zahl1, $zahl2) {
  
    $resultat = $zahl1 + $zahl2;
    
    echo $zahl1," + ",$zahl2," = ",$resultat;
  
  }

}
?>