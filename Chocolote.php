<?php

use Dulces;

    class Bollo extends Dulces{


        public function __construct(
            string $nombre,
            int $numero,
            float $precio,
            private int $porcentajeCacao,
            private float $peso,
            )
        {
            parent::__construct($nombre,$numero,$precio);
        }
        public function muestraResumen(){
            echo "<br>Este chocolate tiene un porcentaje de cacacao " . $this->porcentajeCacao . " y tiene un peso de: " . $this->peso;
        }
    }    
?>