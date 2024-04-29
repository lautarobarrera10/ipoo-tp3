<?php
/*
1. Defina e implemente una clase Cliente que hereda de la clase Persona (DNI, Nombre y Apellido) con la
información básica de un cliente (Nro. de Cliente, DNI, Nombre y Apellido).
*/
Class Cliente extends Persona {
    private $nroCliente;

    /**
     * @param int $nroCliente
     * @param int $dni
     * @param string $nombre
     * @param string $apellido
     */
    public function __construct($nroCliente, $dni, $nombre, $apellido) {
        parent::__construct($dni, $nombre, $apellido);
        $this->nroCliente = $nroCliente;
    }

    // Getters
    public function getNroCliente() {
        return $this->nroCliente;
    }

    // Setters
    public function setNroCliente($nroCliente) {
        $this->nroCliente = $nroCliente;
    }

    // Método __toString
    public function __toString(){
        $cadena = parent::__toString();
        $cadena .= "Número de cliente: " . $this->getNroCliente() . "\n";
        return $cadena;
    }
}