<?php
/*
De cada rubro se almacena la descripción y el porcentaje de
ganancia aplicado a los productos vinculados a ese rubro.
*/
Class Rubro {
    private $nombre;
    private $descripcion;
    private $porcentajeGanancia;

    // Constructor
    public function __construct(string $nombre, string $descripcion, float $porcentajeGanancia) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->porcentajeGanancia = $porcentajeGanancia;
    }

    // Getters
    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPorcentajeGanancia() {
        return $this->porcentajeGanancia;
    }

    // Setters
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setPorcentajeGanancia($porcentajeGanancia) {
        $this->porcentajeGanancia = $porcentajeGanancia;
    }

    public function __toString(){
        return
        "Nombre: " . $this->getNombre() . "\n" .
        "Descripción: " . $this->getDescripcion() . "\n" .
        "Porcentaje de ganancia: " . $this->getPorcentajeGanancia() . "%\n";
    }
}