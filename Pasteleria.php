<?php

include_once("./autoload.php");

    abstract class Pasteleria {

        public function __construct(
            private string $nombre,
            private $productos = array(),
            private int $numProductos,
            private $clientes = array(),
            private int $numPClientes,
        ) {
        }
        public function muestraResumen(){
            echo "<br>El título es: " . $this->titulo . ", el número es: " . $this->getNumero() . ", el precio sin IVA es: " . $this->getPrecio() . " y el precio con IVA incluido es: " . $this->getPrecioConIva();
        }
    }
?>