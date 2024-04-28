<?php

include "Persona.php";
include "Cliente.php";
include "Cuenta.php";
include "CajaDeAhorro.php";
include "CuentaCorriente.php";

$lautaro = new Persona(41421435, "Lautaro", "Barrera");

$cliente1 = new Cliente(1, 41421435, "Pedro", "Luro");

$cuenta1 = new Cuenta(1, 10000, $cliente1);

$cuenta2 = new CajaDeAhorro(2, 1200, $cliente1);

$cuenta3 = new CuentaCorriente(3,100,$cliente1, 10000);

echo $cuenta3;