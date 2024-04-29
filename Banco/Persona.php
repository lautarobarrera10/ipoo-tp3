<?php
/*
1. Defina e implemente una clase Cliente que hereda de la clase Persona (DNI, Nombre y Apellido) con la
información básica de un cliente (Nro. de Cliente, DNI, Nombre y Apellido).
*/
Class Persona {
    private $dni;
    private $nombre;
    private $apellido;

    /**
     * @param int $dni
     * @param string $nombre
     * @param string $apellido
     */
    public function __construct($dni, $nombre, $apellido) {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    // Getters
    public function getDni() {
        return $this->dni;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    // Setters
    public function setDni($dni) {
        $this->dni = $dni;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    // Método __toString
    public function __toString() {
        return
        "DNI: " . $this->getDni() . "\n" .
        "Nombre: " . $this->getNombre() . "\n" .
        "Apellido: " . $this->getApellido() . "\n";
    }
}