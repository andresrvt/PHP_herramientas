<?php

include_once("Dulces.php");
    class Tarta extends Dulces{

        public function __construct(
            string $nombre,
            int $numero,
            float $precio,
            private $rellenos = array(),
            private int $numPisos,
            private int $maxNumComensales,
            private int $minNumComensales = 2
            )
        {
            parent::__construct($nombre,$numero,$precio);
        }
        public function muestraResumen(){
        parent::muestraResumen();
            echo "<br>El relleno es de: " . $this->comprobarPisos() . " cuenta con " . $this->numPisos . " pisos y " . $this->muestraPosiblesComensales();
        }
        public function muestraPosiblesComensales(){
            return "son de " . $this->minNumComensales . " a " . $this->maxNumComensales . " comensales.";
        }

        public function comprobarPisos() {
        $losRellenos = ""; 
            if ($this->numPisos ==  count($this->rellenos)) {
                for ($i=0; $i < count($this->rellenos); $i++) { 
                    $losRellenos = $losRellenos . $this->rellenos[$i] . ", ";
                }
            }else{
                return "No coincide el número de pisos con los de relleno";
            }
        return $losRellenos;
        }
    }    
?>