<?php

namespace app;
include_once("autoload.php");

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

            /**
             * Get the value of relleno
             */ 
            public function getRelleno()
            {
                        return $this->relleno;
            }
    }    
?>