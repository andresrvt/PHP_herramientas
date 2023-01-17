<?php

use Dulces;

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
            echo "<br>El relleno es de: " . $this->relleno;
        }
    }    
?>