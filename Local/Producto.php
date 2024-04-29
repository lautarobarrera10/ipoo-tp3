<?php
/*
De los productos se almacena el código de barra, la descripción, el stock, el porcentaje de iva, el precio de compra y una referencia al rubro que pertenece.
Implementar un método darPrecioVenta() que retorna el precio de venta de un producto y redefinirlo cuando sea necesario.
*/
class Producto {
    private $codigoBarra;
    private $stock;
    private $porcentajeIva;
    private $precioCompra;
    private $objRubro;

    public function __construct(int $codigoBarra, int $stock, float $porcentajeIva, float $precioCompra, Rubro $objRubro){
        $this->codigoBarra = $codigoBarra;
        $this->stock = $stock;
        $this->porcentajeIva = $porcentajeIva;
        $this->precioCompra = $precioCompra;
        $this->objRubro = $objRubro;
    }

    // Getters
    public function getCodigoBarra() {
        return $this->codigoBarra;
    }

    public function getStock() {
        return $this->stock;
    }

    public function getPorcentajeIva() {
        return $this->porcentajeIva;
    }

    public function getPrecioCompra() {
        return $this->precioCompra;
    }

    public function getObjRubro() {
        return $this->objRubro;
    }

    // Setters
    public function setCodigoBarra($codigoBarra) {
        $this->codigoBarra = $codigoBarra;
    }

    public function setStock($stock) {
        $this->stock = $stock;
    }

    public function setPorcentajeIva($porcentajeIva) {
        $this->porcentajeIva = $porcentajeIva;
    }

    public function setPrecioCompra($precioCompra) {
        $this->precioCompra = $precioCompra;
    }

    public function setObjRubro($objRubro) {
        $this->objRubro = $objRubro;
    }

    public function __toString(){
        return
        "Código de barra: " . $this->getCodigoBarra() . "\n" .
        "Stock: " . $this->getStock() . "\n" .
        "Porcentaje de IVA: " . $this->getPorcentajeIva() . "\n" .
        "Precio de compra: " . $this->getPrecioCompra() . "\n" .
        "Rubro: " . $this->getObjRubro() . "\n";
    }

    /**
     * El precio de venta de un producto se calcula sobre el precio de compra, más el porcentaje de ganancia en base a su rubro, más el porcentaje de IVA que se aplica al producto.
     * @return float Precio venta
     */
    public function calcularPrecioVenta(){
        $precioCompra = $this->getPrecioCompra();
        $ganancia = $this->getPrecioCompra() * $this->getObjRubro()->getPorcentajeGanancia() / 100;
        $iva = $this->getPrecioCompra() * $this->getPorcentajeIva() / 100;
        $precioVenta = $precioCompra + $ganancia + $iva;
        return $precioVenta;
    }
}