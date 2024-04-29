<?php
/*
3. Defina una clase Banco con las siguiente variables instancias:
1. coleccionCuentaCorriente: variable que contiene una colección de instancias de la clase
Cuentas Corrientes.
2. coleccionCajaAhorro: variable que contiene una colección de instancias de la clase Caja de Ahorro .
3. ultimoValorCuentaAsignado: variable que contiene el ultimo valor asignado a una cuenta del banco.
4. coleccionCliente: variable que contiene una colección de instancias de la clase Cliente
*/

/*
4. En la clase Banco defina e implemente los siguientes métodos:
1. incorporarCliente(objCliente): permite agregar un nuevo cliente al Banco
2. incorporarCuentaCorriente(numeroCliente, montoDescubierto): Agregar una nueva
Cuenta a la colección de cuentas, verificando que el cliente dueño de la cuenta es cliente
del Banco.
3. incorporarCajaAhorro(numeroCliente):Agregar una nueva Caja de Ahorro a la colección de cajas
de ahorro, verificando que el cliente dueño de la cuenta es cliente del Banco.
4. realizarDeposito(numCuenta,monto): Dado un número de Cuenta y un monto, realizar depósito.
5. realizarRetiro(numCuenta,monto): Dado un número de Cuenta y un monto, realizar retiro.
*/

class Banco {
    private $coleccionCuentaCorriente; // Colección de instancias de la clase CuentaCorriente
    private $coleccionCajaAhorro; // Colección de instancias de la clase CajaDeAhorro
    private $ultimoValorCuentaAsignado; // Último valor asignado a una cuenta del banco
    private $coleccionCliente; // Colección de instancias de la clase Cliente
    private $coleccionCuentas; // Colección de instancias de las clases CajaDeAhorro y CuentaCorriente

    // Constructor
    public function __construct() {
        $this->coleccionCuentaCorriente = array();
        $this->coleccionCajaAhorro = array();
        $this->ultimoValorCuentaAsignado = 0;
        $this->coleccionCliente = array();
        $this->coleccionCuentas = array();
    }

    /**
     * @return array
     */
    public function getColeccionCuentaCorriente() {
        return $this->coleccionCuentaCorriente;
    }

    /**
     * @return array
     */
    public function getColeccionCajaAhorro() {
        return $this->coleccionCajaAhorro;
    }

    /**
     * @return int
     */
    public function getUltimoValorCuentaAsignado() {
        return $this->ultimoValorCuentaAsignado;
    }

    /**
     * @return array
     */
    public function getColeccionCliente() {
        return $this->coleccionCliente;
    }

    /**
     * @return array
     */
    public function getColeccionCuentas() {
        return $this->coleccionCuentas;
    }

    /**
     * @param array $coleccionCuentaCorriente
     */
    public function setColeccionCuentaCorriente($coleccionCuentaCorriente) {
        $this->coleccionCuentaCorriente = $coleccionCuentaCorriente;
    }

    /**
     * @param array $coleccionCajaAhorro
     */
    public function setColeccionCajaAhorro($coleccionCajaAhorro) {
        $this->coleccionCajaAhorro = $coleccionCajaAhorro;
    }

    /**
     * @param int $ultimoValorCuentaAsignado
     */
    public function setUltimoValorCuentaAsignado($ultimoValorCuentaAsignado) {
        $this->ultimoValorCuentaAsignado = $ultimoValorCuentaAsignado;
    }

    /**
     * @param array $coleccionCliente
     */
    public function setColeccionCliente($coleccionCliente) {
        $this->coleccionCliente = $coleccionCliente;
    }

    /**
     * @param array $coleccionCliente
     */
    public function setColeccionCuentas($coleccionCuentas) {
        $this->coleccionCuentas = $coleccionCuentas;
    }

    public function __toString(){
        return
        "Cuentas Corrientes:\n" .
        implode("\n", $this->getColeccionCuentaCorriente()) . "\n" .
        "Cajas de ahorro:\n" .
        implode("\n", $this->getColeccionCajaAhorro()) . "\n" .
        "Último valor cuenta asignado: " . $this->getUltimoValorCuentaAsignado() . "\n\n" .
        "🫅  Clientes\n\n" .
        implode("\n", $this->getColeccionCliente()) . "\n";
    }

    /**
     * Agrega la cuenta a la colección de cuentas y suma 1 en el conteo de cuentas
     * @param Cuenta $cuenta
     */
    public function sumarCuenta($cuenta){
        $cuentasActuales = $this->getUltimoValorCuentaAsignado();
        $nuevasCuentas = $cuentasActuales + 1;
        $this->setUltimoValorCuentaAsignado($nuevasCuentas);

        $cuentas = $this->getColeccionCuentas();
        array_push($cuentas, $cuenta);
        $this->setColeccionCuentas($cuentas);
    }

    /**
     * @param Cliente $cliente
     * @return array Colección de clientes
     */
    public function incorporarCliente(Cliente $cliente){
        $clientes = $this->getColeccionCliente();
        array_push($clientes, $cliente);
        $this->setColeccionCliente($clientes);
        return $clientes;
    }

    /**
     * Busca el cliente en la base de datos y lo retorna.
     * @param int $nroCliente
     * @return Cliente
     */
    public function obtenerCliente($nroCliente){
        $coleccionClientes = $this->getColeccionCliente();
        $clienteEncontrado = null;
        $indice = 0;
        $encontrado = false;
        while (!$encontrado && $indice < count($coleccionClientes)){
            $cliente = $coleccionClientes[$indice];
            if ($cliente->getNroCliente() == $nroCliente){
                $clienteEncontrado = $cliente;
                $encontrado = true;
            }
            $indice++;
        }
        return $clienteEncontrado;
    }

    /**
     * Incorpora una nueva cuenta corriente
     * @param int $numeroCliente
     * @param float $montoDescubierto
     * @return array Nueva lista de cuentas corrientes
     */
    public function incorporarCuentaCorriente($numeroCliente, $montoDescubierto){
        $cliente = $this->obtenerCliente($numeroCliente);
        if($cliente){
            $numeroCuenta = $this->getUltimoValorCuentaAsignado() + 1;
            $nuevaCuenta = new CuentaCorriente($numeroCuenta, $cliente, $montoDescubierto);
            $cuentasCorrientes = $this->getColeccionCuentaCorriente();
            array_push($cuentasCorrientes, $nuevaCuenta);
            $this->setColeccionCuentaCorriente($cuentasCorrientes);
            $this->sumarCuenta($nuevaCuenta);
        }
        return $this->getColeccionCuentaCorriente();
    }

    /**
     * Incorpora una nueva cuenta corriente
     * @param int $numeroCliente
     * @return array Nueva lista de cajas de ahorro
     */
    public function incorporarCajaAhorro($numeroCliente){
        $cliente = $this->obtenerCliente($numeroCliente);
        if ($cliente){
            $numeroCuenta = $this->getUltimoValorCuentaAsignado() + 1;
            $nuevaCuenta = new CajaDeAhorro($numeroCuenta, $cliente);
            $cajasAhorro = $this->getColeccionCajaAhorro();
            array_push($cajasAhorro, $nuevaCuenta);
            $this->setColeccionCajaAhorro($cajasAhorro);
            $this->sumarCuenta($nuevaCuenta);
        }
        return $this->getColeccionCajaAhorro();
    }

    /**
     * Buscar una cuenta en la colección de cuentas con el número de la misma
     * @param int $numeroCuenta
     * @return Cuenta
     */
    public function buscarCuenta($numeroCuenta){
        $coleccionCuentas = $this->getColeccionCuentas();
        $indice = 0;
        $cuentaEncontrada = null;
        $encontrada = false;
        while (!$encontrada && $indice < count($coleccionCuentas)){
            $cuenta = $coleccionCuentas[$indice];
            if ($cuenta->getNroCuenta() == $numeroCuenta){
                $encontrada = true;
                $cuentaEncontrada = $cuenta;
            }
            $indice++;
        }
        return $cuentaEncontrada;
    }

    /**
     * Realiza un depósito en una cuenta existente, retorna el saldo resultante.
     * @param int $numCuenta
     * @param float $monto
     * @return float Nuevo saldo
     */
    public function realizarDeposito($numCuenta, $monto){
        $saldo = 0;
        $cuenta = $this->buscarCuenta($numCuenta);
        if ($cuenta) {
            $cuenta->realizarDeposito($monto);
            $saldo = $cuenta->getSaldo();
        }
        return $saldo;
    }

        /**
     * Realiza un retiro en una cuenta existente, retorna el saldo resultante.
     * @param int $numCuenta
     * @param float $monto
     * @return float Nuevo saldo
     */
    public function realizarRetiro($numCuenta, $monto){
        $saldo = 0;
        $cuenta = $this->buscarCuenta($numCuenta);
        if ($cuenta) {
            $cuenta->realizarRetiro($monto);
            $saldo = $cuenta->getSaldo();
        }
        return $saldo;
    }
}
