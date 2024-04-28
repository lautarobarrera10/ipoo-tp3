<?php

include "Persona.php";
include "Cliente.php";
include "Cuenta.php";
include "CajaDeAhorro.php";
include "CuentaCorriente.php";
include "Banco.php";

$cliente1 = new Cliente(1, 41421435, "Pedro", "Luro");
$cliente2 = new Cliente(2, 41421432, "Juan", "Luro");

$ahorro1 = new CajaDeAhorro(1, $cliente1);
$ahorro2 = new CajaDeAhorro(2, $cliente1);
$corriente1 = new CuentaCorriente(3,$cliente1, 10000);
$corriente2 = new CuentaCorriente(4,$cliente1, 5000);

$bancoPatagonia = new Banco;
$bancoPatagonia->incorporarCliente($cliente1);
$bancoPatagonia->incorporarCliente($cliente2);
echo implode("\n", $bancoPatagonia->incorporarCuentaCorriente(1, 10000));
echo implode("\n", $bancoPatagonia->incorporarCuentaCorriente(1, 12000));
echo implode("\n", $bancoPatagonia->incorporarCuentaCorriente(2, 20000));
echo implode("\n", $bancoPatagonia->incorporarCuentaCorriente(3, 200000));

echo implode("\n", $bancoPatagonia->incorporarCajaAhorro(1));
echo implode("\n", $bancoPatagonia->incorporarCajaAhorro(1));
echo implode("\n", $bancoPatagonia->incorporarCajaAhorro(2));
echo implode("\n", $bancoPatagonia->incorporarCajaAhorro(3));

echo $bancoPatagonia->realizarDeposito(3, 10000) . "\n";
echo $bancoPatagonia->realizarDeposito(7, 10000) . "\n";
echo $bancoPatagonia->realizarRetiro(3, 2000) . "\n";
echo $bancoPatagonia->realizarRetiro(4, 2000);

echo implode("\n", $bancoPatagonia->getColeccionCuentas());
