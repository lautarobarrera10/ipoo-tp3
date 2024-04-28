<?php
/*
5. Implemente una clase TestBanco que realice las siguientes operaciones:
1. Crear un objeto de la clase Banco.
2. Crear dos nuevos clientes Cliente1 y Cliente2, y agregarlos al banco.
3. Crear dos Cuentas Corrientes, una asociada al cliente A y otra al cliente B, y agregarlas al Banco .
4. Crear tres Cajas de Ahorro, dos asociadas al cliente A y una asociada al cliente B, y agregarlas al Banco .
5. Depositar $300 en cada una de las Cajas de Ahorro.
6. Transferir $150 de la Cuenta Corriente de Cliente1, a la Caja de Ahorro de Cliente2.
7. Mostrar los datos de todas las cuentas.
*/

function obtenerClases(){
    include "Persona.php";
    include "Cliente.php";
    include "Cuenta.php";
    include "CajaDeAhorro.php";
    include "CuentaCorriente.php";
    include "Banco.php";
}

function transferir(Banco $banco, int $numCuentaEnvia, int $numCuentaRecibe, float $monto){
    $banco->realizarRetiro($numCuentaEnvia, $monto);
    $banco->realizarDeposito($numCuentaRecibe, $monto);
}

function TestBanco(){
    obtenerClases();
    $banco = new Banco;
    $cliente1 = new Cliente(1, 41425965, "Juana", "Villegas");
    $cliente2 = new Cliente(2, 43459625, "Martín", "Linch");
    $banco->incorporarCliente($cliente1);
    $banco->incorporarCliente($cliente2);
    $banco->incorporarCuentaCorriente(1, 500);
    $banco->incorporarCuentaCorriente(2, 500);
    $banco->incorporarCajaAhorro(1);
    $banco->incorporarCajaAhorro(2);
    $banco->realizarDeposito(3, 300);
    $banco->realizarDeposito(4, 300);
    transferir($banco, 1, 4, 150);
    echo implode("\n", $banco->getColeccionCuentas());
}

TestBanco();