<?php
    class Cliente {
        
        function __construct(
            public string $nombre,
            private int $numero,
            private $dulcesComprados = array(),
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
   

        function comprar (Dulces $dulce){
            echo "<br>";
            if (($this->listaDeDulces($dulce))) {
                $this->dulcesComprados[] = $dulce;
                echo "Se ha comprado el dulce correctamente";
                return $this;
            }else{
                echo "No se ha podido comprar el dulce";
            }
        }
        public function valorar(Dulces $dulce, String $mensaje){
            echo "<br>Se ha valorado el dulce: " . $dulce->nombre . ", con el siguiente mensaje: " . $mensaje;
        }

        function listarPedidos(){
            echo "<br>";
            foreach ($this->dulcesComprados as $pitumba=>$key) {
                print_r($key);
                echo "<br>";
            }
        }

    /**
     * Get the value of numPedidosEfectuados
     */ 
    public function getNumPedidosEfectuados()
    {
        return $this->numPedidosEfectuados;
    }
    }

?>