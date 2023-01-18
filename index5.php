<?php

    include_once("Cliente.php");
    include_once("Bollo.php");
    include_once("Chocolate.php");
    include_once("Tarta.php");
  
    $dulce1 = new Bollo("Bomba de chocolate", 23, 3.5, "chocolate");
    $dulce2 = new Chocolate("Nestlé", 6, 2.95, 25, 100);
    $rellenos = ["chocolate", "nata"];
    $dulce3 = new Tarta("Tarta de la abuela", 24, 15, $rellenos, 3,10);
    $dulcesComprados = [$dulce1,$dulce2,$dulce3];

    $cliente1 = new Cliente("Cliente misterioso", 23,$dulcesComprados,1);
    $cliente1->comprar($dulce1);
    $cliente1->comprar($dulce2);
    $cliente1->comprar($dulce3);

    $cliente1->valorar($dulce1,"Vaya locura de bollo");
    $cliente1->valorar($dulce2,"Cada vez son más finas!!");
    $cliente1->valorar($dulce3,"Nunca falla la tarta de la abuela");
    $cliente1->listarPedidos();
?>