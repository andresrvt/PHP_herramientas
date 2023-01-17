<?php

include_once("Dulces.php");
    class Bollo extends Dulces{


        public function __construct(
            string $nombre,
            int $numero,
            float $precio,
            private string $relleno,
            )
        {
            parent::__construct($nombre,$numero,$precio);
        }
        public function muestraResumen(){
            parent::muestraResumen();
            echo "<br>El relleno es de: " . $this->relleno;
        }
    }    
?>