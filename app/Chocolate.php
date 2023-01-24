<?php
namespace app;
include_once("autoload.php");
include_once("Dulces.php");
    class Chocolate extends Dulces{


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
            parent::muestraResumen();
            echo "<br>Este chocolate tiene un porcentaje de cacacao " . $this->porcentajeCacao . "% y tiene un peso de: " . $this->peso . "gr";
        } 

        /**
         * Get the value of porcentajeCacao
         */ 
        public function getPorcentajeCacao()
        {
                    return $this->porcentajeCacao;
        }
    }    
?>