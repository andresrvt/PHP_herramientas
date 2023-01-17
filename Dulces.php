<?php

include_once("Resumible.php");
    class Dulces implements Resumible{

        public function __construct(
            public string $nombre,
            protected int $numero,
            private float $precio
        ) {
        }
        const IVA = 0.21;

    function getPrecioConIva(): float
    {
        $precioIva = $this->precio + $this->precio * $this::IVA;
        return $precioIva;
    }

            public function getNumero()
            {
                return $this->numero;
            }
            
            /**
             * Set the value of numero
             *
             * @return  self
             */ 
            public function setNumero($numero)
            {
                $this->numero = $numero;
                
                return $this;
            }
            public function muestraResumen(){
                echo "<br>El nombre es: " . $this->nombre . ", el número es: " . $this->getNumero() . ", el precio sin IVA es: " . $this->precio . "€ y el precio con IVA incluido es: " . $this->getPrecioConIva() . "€.";
            }
    }
?>