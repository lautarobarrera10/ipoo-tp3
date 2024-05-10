<?php
/*
Implementar la clase Local que contiene una colección de productos importados y una colección de productos regionales, la colección de ventas realizadas por la agencia.
*/
Class Local {
    private $coleccionProductos;
    private $coleccionVentas;

    public function __construct(array $coleccionProductos, array $coleccionVentas){
        $this->coleccionProductos = $coleccionProductos;
        $this->coleccionVentas = $coleccionVentas;
    }

    public function getColeccionProductos(){
        return $this->coleccionProductos;
    }

    public function setColeccionProductos($value){
        $this->coleccionProductos = $value;
    }

    public function getColeccionVentas(){
        return $this->coleccionVentas;
    }

    public function setColeccionVentas($value){
        $this->coleccionVentas = $value;
    }

    public function __toString(){
        return
        "Productos: \n" . implode("\n", $this->getColeccionProductos()) . "\n" .
        "Ventas: \n" . implode("\n", $this->getColeccionVentas()) . "\n";
    }

    public function incorporarProductoLocal (Producto $objProducto){
        // incorporarProductoLocal (objProducto): método que recibe por parámetro un objeto Producto y verifica que el código de barra no se encuentre dentro de la lista. Si el producto ya existe no es incorporado dentro de la lista de productos de la tienda. El método retorna verdadero o falso según corresponda.
        $colProductos = $this->getColeccionProductos();
        $existe = false;
        $i = 0;
        while (!$existe && $i < count($colProductos)){
            if ($colProductos[$i]->getCodigoBarra() == $objProducto->getCodigoBarra()){
                $existe = true;
            }
            $i++;
        }
        if (!$existe){
            array_push($colProductos, $objProducto);
            $this->setColeccionProductos($colProductos);
        }
        return !$existe;
    }
    public function retornarImporteProducto($codProducto){
        // retornarImporteProducto(codProducto): método que recibe por parámetro el código de un producto y retorna el precio de venta.
        $precio = -1;
        $objProducto = $this->buscarProducto($codProducto);
        if ($objProducto != null){
            $precio = $objProducto->calcularPrecioVenta();
        }
        return $precio;
    }
    public function retornaCostoProductoLocal(){
        // retornarCostoProductoLocal (): recorre todos los productos de la tienda y retorna la suma de los costos de cada producto teniendo en cuenta el stock de cada uno.
        $colProductos = $this->getColeccionProductos();
        $importe = 0;
        foreach($colProductos as $producto){
            $importe += $producto->getStock() * $producto->getPrecioCompra();
        }
        return $importe;
    }
    public function productoMasEconomico(String $rubro){
        // método que retorna el producto más económico de un rubro.
        $colProductos = $this->getColeccionProductos();
        $productoMasEconomico = null;
        foreach ($colProductos as $producto){
            if ($producto->getObjRubro()->getDescripcion() == $rubro){
                if ($productoMasEconomico == null){
                    $productoMasEconomico = $producto;
                } else {
                    if ($productoMasEconomico->calcularPrecioVenta() > $producto->calcularPrecioVenta()){
                        $productoMasEconomico = $producto;
                    }
                }
            }
        }
        return $productoMasEconomico;
    }
    public function informarProductosMasVendidos($anio, $n){
        // retorna los n productos más vendidos en el año recibido por parámetro.
        $colVentas = $this->getColeccionVentas();
        $colProductosVendidos = [];
        foreach ($colVentas as $venta){
            $anioVenta = date_format($venta->getFecha(), "Y");
            if ($anioVenta == $anio){
                foreach($venta->getColeccionObjProducto() as $productoVendido){
                    if ($colProductosVendidos[$productoVendido->getCodigoBarra()] != null){
                        $colProductosVendidos[$productoVendido->getCodigoBarra()] += 1;
                    } else {
                        $colProductosVendidos[$productoVendido->getCodigoBarra()] = 1;
                    }
                }
            }
        }

        // Ordena de mayor a menor
        arsort($colProductosVendidos);

        $colProductosMasVendidos = [];
        for ($i=0; $i < $n; $i++) { 
            $producto = $this->buscarProducto($colProductosVendidos[$i]);
            array_push($colProductosMasVendidos, $producto);
        }

        return $colProductosMasVendidos;
    }

    public function promedioVentasImportados(){
        // método que retorna el promedio de ventas de productos importados realizadas.
        $colVentas = $this->getColeccionVentas();
        $sumaVentas = 0;
        $sumaProductos = 0;
        foreach ($colVentas as $venta){
            foreach ($venta->getColeccionObjProducto() as $producto){
            if(is_a($producto, 'ProductoImportado')){
                $sumaVentas += $producto->calcularPrecioVenta();
                $sumaProductos++;
            }
            }
        }
        $promedio = $sumaVentas / $sumaProductos;
        return $promedio;
    }

    public function informarConsumoCliente($tipoDoc, $numDoc){
        // método que retorna todos los productos que fueron comprados por la persona identificada con el tipoDoc y numDoc recibidos por parámetro.
        $colVentas = $this->getColeccionVentas();
        $colProductosCompradosCliente = [];
        foreach ($colVentas as $venta){
            $cliente = $venta->getObjCliente();
            if ($cliente->getDni() == $numDoc){
                foreach($venta->getColeccionObjProducto() as $producto){
                    array_push($colProductosCompradosCliente, $producto);
                }
            }
        }
        return $colProductosCompradosCliente;
    }

    private function buscarProducto($codigoBarra){
        $objProducto = null;

        $colProductos = $this->getColeccionProductos();
        $existe = false;
        $i = 0;
        while (!$existe && $i < count($colProductos)){
            if ($colProductos[$i]->getCodigoBarra() == $codigoBarra){
                $existe = true;
                $objProducto = $colProductos[$i];
            }
            $i++;
        }

        return $objProducto;
    }
}