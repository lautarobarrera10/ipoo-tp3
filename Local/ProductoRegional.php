<?php
/*
Si son regionales se almacena un porcentaje de descuento que será aplicado al precio de venta.
*/
Class ProductoRegional extends Producto{
    private $descuentoRegional;

    public function __construct(int $codigoBarra, int $stock, float $porcentajeIva, float $precioCompra, Rubro $objRubro){
        parent::__construct($codigoBarra, $stock, $porcentajeIva, $precioCompra, $objRubro);
        $this->descuentoRegional = 0;
    }

    // Getter
    public function getDescuentoRegional() {
        return $this->descuentoRegional;
    }

    // Setter
    public function setDescuentoRegional($descuentoRegional) {
        $this->descuentoRegional = $descuentoRegional;
    }

    public function __toString(){
        $cadena = parent::__toString();
        $cadena += "Descuento regional: " . $this->getDescuentoRegional() . "% \n";
        return $cadena;
    }
}

