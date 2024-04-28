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
Class CuentaCorriente extends Cuenta {
    private $limiteDescubierto;

    /**
     * @param int $nroCuenta
     * @param Cliente $objOwner
     * @param float $limiteDescubierto
     */
    public function __construct($nroCuenta, $objOwner, $limiteDescubierto){
        parent::__construct($nroCuenta, $objOwner);
        $this->limiteDescubierto = $limiteDescubierto;
    }

    /**
     * @return float Límite para girar al descubierto
     */
    public function getLimiteDescubierto(){
        return $this->limiteDescubierto;
    }

    /**
     * @param float $limiteDescubierto
     */
    public function setLimiteDescubierto($limiteDescubierto){
        $this->limiteDescubierto = $limiteDescubierto;
    }

    /**
     * @return string
     */
    public function __toString(){
        $cadena = parent::__toString();
        $cadena .= "Límite descubierto: " . $this->getLimiteDescubierto() . "\n";
        return $cadena;
    }
}