<?php

/*
Se crean 2 rubros: conservas con un 35 % de ganancia, regalos con un 55 % de ganancia.
• Se crean 4 instancias de la clase Producto y se vinculan a los rubros creados en el inciso anterior.
• Se incorpora cada instancia de la clase Producto a la Tienda.
• Se incorpora nuevamente la última instancia de producto incorporada a la tienda y visualizar el resultado.
• Se retorna el precio de venta de cada uno de los productos creados.
• Se retorna el costo en productos que tiene hasta el momento la tienda
*/

include "Rubro.php";
include "Producto.php";
include "ProductoImportado.php";
include "ProductoRegional.php";
include "Local.php";

$objRubroConservas = new Rubro("Conservas", "Conservas", 35);
$objRubroRegalos = new Rubro("Regalos", "Regalos", 55);

$objProducto1 = new ProductoRegional(1, 1, 21, 50, $objRubroConservas);
$objProducto2 = new ProductoRegional(2, 1, 21, 30, $objRubroRegalos);
$objProducto3 = new ProductoImportado(3, 1, 21, 80, $objRubroConservas);
$objProducto4 = new ProductoImportado(4, 1, 21, 90, $objRubroRegalos);

$objLocal = new Local([],[]);

$objLocal->incorporarProductoLocal($objProducto1);
$objLocal->incorporarProductoLocal($objProducto2);
$objLocal->incorporarProductoLocal($objProducto3);
$objLocal->incorporarProductoLocal($objProducto4);
$objLocal->incorporarProductoLocal($objProducto4);

// echo $objLocal;

// $productos = $objLocal->getColeccionProductos();
// foreach ($productos as $producto){
//     echo $producto . "\n Precio de venta: " . $producto->calcularPrecioVenta();
// }

echo $objLocal->retornaCostoProductoLocal();