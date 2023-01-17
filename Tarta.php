<?php

use Dulces;

    class Tarta extends Dulces{

    private int $minNumComensales = 2;
        public function __construct(
            string $nombre,
            int $numero,
            float $precio,
            private $rellenos = array(),
            private int $numPisos,
            private int $maxNumComensales,
            )
        {
            parent::__construct($nombre,$numero,$precio);
        }
        public function muestraResumen(){
            echo "<br>El relleno es de: " . $this->rellenos . ", cuenta con " . $this->numPisos . " pisos y " . $this->muestraPosiblesComensales();
        }
        public function muestraPosiblesComensales(){
            echo "<br>son de " . $this->minNumComensales . " a " . $this->maxNumComensales . "comensales.";
        }
    }    
?>