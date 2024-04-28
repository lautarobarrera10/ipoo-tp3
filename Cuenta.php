<?php
/*
2. Defina e implemente una clase “Cuenta” que contenga la información de una cuenta de un banco y haga
referencia a su dueño. Tener en cuenta que las cuentas pueden ser de 2 tipos: Cuenta Corriente o Caja de
Ahorro.
Nota: La Cuenta Corriente se distingue de una Caja de Ahorro porque su dueño puede girar en descubierto. Es
por ello que la clase Cuenta Corriente debe tener un atributo que determine el monto máximo para girar en
descubierto.
Implementar los siguientes métodos en la clase:
1. saldoCuenta() : retorna el saldo de la cuenta.
2. realizarDeposito(monto): permite realizar un depósito a la cuenta una cantidad “monto” de dinero.
3. realizarRetiro(monto): permite realizar un retiro de la cuenta por una cantidad “monto” de dinero.
*/
Class Cuenta {
    private $nroCuenta;
    private $saldo;
    private $objOwner; // Objeto de tipo Cliente que representa al propietario de la cuenta

    /**
     * @param int $nroCuenta
     * @param float $saldo
     * @param Cliente $objOwner
     */
    public function __construct($nroCuenta, $saldo, $objOwner) {
        $this->nroCuenta = $nroCuenta;
        $this->saldo = $saldo;
        $this->objOwner = $objOwner;
    }

    // Getters
    /**
     * @return int Número de cuenta
     */
    public function getNroCuenta() {
        return $this->nroCuenta;
    }

    /**
     * @return float Saldo de la cuenta
     */
    public function getSaldo() {
        return $this->saldo;
    }

    /**
     * @return Cliente Propietario de la cuenta
     */
    public function getObjOwner() {
        return $this->objOwner;
    }

    // Setters
    /**
     * @param int $nroCuenta
     */
    public function setNroCuenta($nroCuenta) {
        $this->nroCuenta = $nroCuenta;
    }

    /**
     * @param float $saldo
     */
    public function setSaldo($saldo) {
        $this->saldo = $saldo;
    }

    /**
     * @param Cliente $objOwner
     */
    public function setObjOwner($objOwner) {
        $this->objOwner = $objOwner;
    }

    // Método __toString
    public function __toString() {
        return
        "Número de Cuenta: " . $this->nroCuenta . "\n" .
        "Saldo: " . $this->saldo . "\n" .
        "Propietario:\n" . $this->objOwner;
    }

    /**
     * @return float El saldo de la cuenta
     */
    public function saldoCuenta() {
        return $this->getSaldo();
    }

    /**
     * @param float $monto
     * @return float Nuevo saldo
     */
    public function realizarDeposito($monto){
        $saldoActual = $this->getSaldo();
        $nuevoSaldo = $saldoActual + $monto;
        $this->setSaldo($nuevoSaldo);
        return $this->getSaldo();
    }

    /**
     * @param float $monto
     * @return float Nuevo saldo
     */
    public function realizarRetiro($monto){
        $saldoActual = $this->getSaldo();
        $nuevoSaldo = $saldoActual - $monto;
        $this->setSaldo($nuevoSaldo);
        return $this->getSaldo();
    }
}