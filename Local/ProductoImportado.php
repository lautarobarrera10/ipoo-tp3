<?php
/*
Los productos del local pueden ser regionales o importados. Si son importados, el precio de venta se incrementa un 50 % y se agrega un impuesto del 10 % sobre el valor obtenido.
*/
Class ProductoImportado extends Producto {
    private $porcentajePorImportacion;
    private $porcentajePorImpuestos;

    public function __construct(int $codigoBarra, int $stock, float $porcentajeIva, float $precioCompra, Rubro $objRubro){
        parent::__construct($codigoBarra, $stock, $porcentajeIva, $precioCompra, $objRubro);
        $this->porcentajePorImportacion = 50;
        $this->porcentajePorImpuestos = 10;
    }

    // Getters
    public function getPorcentajePorImportacion() {
        return $this->porcentajePorImportacion;
    }

    public function getPorcentajePorImpuestos() {
        return $this->porcentajePorImpuestos;
    }

    // Setters
    public function setPorcentajePorImportacion($porcentajePorImportacion) {
        $this->porcentajePorImportacion = $porcentajePorImportacion;
    }

    public function setPorcentajePorImpuestos($porcentajePorImpuestos) {
        $this->porcentajePorImpuestos = $porcentajePorImpuestos;
    }

    public function __toString(){
        $cadena = parent::__toString();
        $cadena .= "Porcentaje por importación: " . $this->getPorcentajePorImportacion() . "%\n";
        $cadena .= "Porcentaje por impuestos: " . $this->getPorcentajePorImpuestos() . "%\n";
        return $cadena;
    }

    /**
     * El precio de venta de un producto se calcula sobre el precio de compra, más el porcentaje de ganancia en base a su rubro, más el porcentaje de IVA que se aplica al producto. Si son importados, el precio de venta se incrementa un 50 % y se agrega un impuesto del 10 % sobre el valor obtenido.
     * @return float Precio venta
     */
    public function calcularPrecioVenta(){
        $precioVenta = parent::calcularPrecioVenta();
        $precioPorImportacion = $precioVenta + $precioVenta * $this->getPorcentajePorImportacion() / 100;
        $precioConImpuestos = $precioPorImportacion + $precioPorImportacion * $this->getPorcentajePorImpuestos() / 100;
        return $precioConImpuestos;
    }
}