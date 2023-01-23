<?php

include_once("./autoload.php");

    class Pasteleria{
        private $clientes = array();
        private $productos = array();
        private int $numProductos;

        public function __construct(
            private string $nombre,
            private int $numClientes,
        ) {
        }
        private function incluirProducto(Dulces $dulce){
            $this->productos[] = $dulce;
        }
        function incluirTarta($nombre,$precio,$rellenos,$numPisos,$maxNumComensales,$minNumComensales=2){
            $tarta = new Tarta($nombre,$this->getNumProductos(),$precio,$rellenos,$numPisos,$maxNumComensales,$minNumComensales); 
            $this -> numProductos++; 
            $this->incluirProducto($tarta);
        }

        function incluirChocolate($nombre,$precio,$porcentajeCacao,$peso){
            $chocolate = new Chocolate($nombre,$this->getNumProductos(),$precio,$porcentajeCacao,$peso); 
            $this -> numProductos++; 
            $this->incluirProducto($chocolate);
        }

        function incluirBollo($nombre,$precio,$relleno){
            $bollo = new Bollo($nombre,$this->getNumProductos(),$precio,$relleno); 
            $this -> numProductos++;
            $this->incluirProducto($bollo); 
        }
        function incluirCliente($nombre,$numero,$numDulcesComprados){
            $cliente = new Cliente($nombre,$numero,$numDulcesComprados);
            $this -> numClientes++; 
            $this->clientes[] = $cliente;
        }
        function listaDeDulces(Dulces $dulce){
            echo "<br>";
            foreach ($this->productos as $key) {
                print_r($key);
                echo "<br>";
            }
        }
        function listarPedidos(){
            echo "<br>";
            foreach ($this->clientes as $key) {
                print_r($key);
                echo "<br>";
            }
        }

        public function getNumProductos()
        {
            return count($this->productos);
        }
        public function comprarClienteProducto(int $numeroCliente, int $numeroDulce)
        {
            $saveCliente = "";
            $dulce = "";
            try {
                // recorro el array "$clientes"
                foreach ($this->clientes as $key => $obj) {
                    //si el número de algún cliente coincide con el parámetro "$numCliente" recorro el array "$productos"
                    if ($obj->getNumero() == $numeroCliente) {
                        $saveCliente = $obj; // Asigno aquí un cliente a esta variable para poder lanzar posteriormente ClienteNoEncontradoException
                            // recorro el array "$productos"
                            foreach ($this->productos as $value => $prod) {
                                // si el parámetro "$numeroDulce" coincide con algún número de productos el cliente comprará el dulce
                                if ($prod->getNumero() == $numeroDulce) {
                                    $dulce = $prod;
                                    $saveCliente->comprar($dulce);
                                    return $this;
                                }
                            }
                            if($dulce == null){
                                throw new DulceNoEncontradoException();
                            }
                    }
                }
                // en el caso de que "$saveCliente" esté vacío lanzaremos la excepción
                if ($saveCliente == "") {
                    throw new ClienteNoEncontradoException();
                }
            } catch (ClienteNoEncontradoException $e) {
                echo $e->getMessage();
            } catch (DulceNoEncontradoException $e) {
                echo $e->getMessage();
            }
            return $this;
        }
    }
?>