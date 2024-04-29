<?php
/*
Implementar la clase Local que contiene una colección de productos importados y una colección de productos regionales, la colección de ventas realizadas por la agencia.
*/
Class Local {
    private $coleccionProductosImportados;
    private $coleccionProductosRegionales;
    private $coleccionVentas;

    public function incorporarProductoLocal ($objProducto){
        // incorporarProductoLocal (objProducto): método que recibe por parámetro un objeto Producto y verifica que el código de barra no se encuentre dentro de la lista. Si el producto ya existe no es incorporado dentro de la lista de productos de la tienda. El método retorna verdadero o falso según corresponda.
    }
    public function retornarImporteProducto($codProducto){
        // retornarImporteProducto(codProducto): método que recibe por parámetro el código de un producto y retorna el precio de venta.
    }
    public function retornaCostoProductoLocal(){
        // retornarCostoProductoLocal (): recorre todos los productos de la tienda y retorna la suma de los costos de cada producto teniendo en cuenta el stock de cada uno.
    }
    public function productoMasEconomico($rubro){
        // método que retorna el producto más económico de un rubro.
    }
    public function informarProductosMasVendidos($year, $n){
        // retorna los n productos más vendidos en el año recibido por parámetro.
    }
    public function promedioVentasImportados(){
        // método que retorna el promedio de ventas de productos importados realizadas.
    }
    public function informarConsumoCliente($tipoDoc, $numDoc){
        // método que retorna todos los productos que fueron comprados por la persona identificada con el tipoDoc y numDoc recibidos por parámetro.
    }
}