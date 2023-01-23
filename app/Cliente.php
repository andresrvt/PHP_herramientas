<?php
namespace app;

include_once("autoload.php");
use util\DulceNoCompradoException;
    class Cliente {

    private $dulcesComprados = array();

        function __construct(
            public string $nombre,
            private int $numero,
            private int $numDulcesComprados,
            private int $numPedidosEfectuados = 0
        ){

        }
        public function getNumero()
        {
            return $this->numero;
        }

        /**
         * Set the value of num
         *
         * @return  self
         */ 
        public function setNumero($numero)
        {
            $this->numero = $numero;

            return $this;
        }

        function listaDeDulces (Dulces $dulce):bool{
            if (in_array($dulce, $this->dulcesComprados)) {
                return true;
            }else{
                return false;
            }
        }
   
        public function getNumPedidosEfectuados()
        {
            return $this->numPedidosEfectuados;
        }
    
        public function setNumPedidosEfectuados($numPedidosEfectuados)
        {
            $this->numPedidosEfectuados = $numPedidosEfectuados;

            return $this;
        }

        public function comprar(Dulces $dulce)
        {
            $this->setNumPedidosEfectuados($this->getNumPedidosEfectuados() + 1);
            $this->dulcesComprados[] = $dulce;
            echo "<br>Dulce comprado con éxito";
            return $this;
        }
        public function valorar(Dulces $dulce, String $mensaje)
        {
            if ($this->listaDeDulces($dulce)) {
    
                echo $mensaje;
            } else {
                throw new DulceNoCompradoException();
            }
            return $this;
        }

        function listarPedidos(){
            echo "<br>";
            foreach ($this->dulcesComprados as $pitumba=>$key) {
                print_r($key);
                echo "<br>";
            }
        }
    }

?>