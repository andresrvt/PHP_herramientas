<?php

include_once("autoload.php");
use app\Tarta;

$rellenos = ["chocolate", "nata", "trufa"];
$tarta1 = new Tarta("Bosque negro", 16, 3,$rellenos,3,5); 
$tarta1->muestraResumen();

?>
