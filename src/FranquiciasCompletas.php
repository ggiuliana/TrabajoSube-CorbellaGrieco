<?php
namespace TrabajoSube;

class FranquiciasCompletas extends Tarjeta{
    public $porcentajeTarifa = 0; // 100%
    public $tipo = "completa";

    function __construct($saldo = 0, $id = 0){
        $this->saldo = $saldo;
        $this->id = $id;
    }    
    public function cobrarBoleto($tarifa) {
        if ($this->saldo - $tarifa * $this->porcentajeTarifa >= -211.84) {
            $this->saldo -= $tarifa * $this->porcentajeTarifa;
            $this->viajes += 1;
            $this->fechaUltimoBoleto = date("m/Y");
            return true;
        } else {
            print 'Saldo insuficiente';
            return false;
        }
        return false;
    }
}