<?php
/*
De las Ventas se almacena la fecha, la referencia al producto o los productos y el cliente al que se le ha realizado la venta.
*/
Class Venta {
    private $fecha;
    private $coleccionObjProducto;
    private $objCliente;

    public function __construct(DateTime $fecha, array $coleccionObjProducto, Cliente $objCliente) {
        $this->fecha = $fecha;
        $this->coleccionObjProducto = $coleccionObjProducto;
        $this->objCliente = $objCliente;
    }

    // Getters
    public function getFecha() {
        return $this->fecha;
    }

    public function getColeccionObjProducto() {
        return $this->coleccionObjProducto;
    }

    public function getObjCliente() {
        return $this->objCliente;
    }

    // Setters
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setColeccionObjProducto($coleccionObjProducto) {
        $this->coleccionObjProducto = $coleccionObjProducto;
    }

    public function setObjCliente($objCliente) {
        $this->objCliente = $objCliente;
    }

    public function __toString(){
        return
        "Fecha: " . $this->getFecha() . "\n" .
        "Productos: " . implode("\n", $this->getColeccionObjProducto()) . "\n" .
        "Cliente: " . $this->getObjCliente();
    }

    public function darImporteVenta(){
        // El importe final de una venta normal se calcula en base a la cantidad de productos, por el importe del producto.
        $colProductos = $this->getColeccionObjProducto();
        $importe = 0;
        foreach($colProductos as $producto){
            $importe += $producto->calcularPrecioVenta();
        }
        return $importe;
    }
}