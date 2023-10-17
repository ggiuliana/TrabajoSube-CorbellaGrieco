<?php
namespace TrabajoSube;

class Tarjeta{
    public $saldo;
    public $id;
    public $tipo = "normal";
    public $saldoPendiente;
    public $fechaUltimoBoleto; // mes y año
    public $viajes = 0;
    
    public function __construct($saldo = 0, $id =0){
        $this->saldo = $saldo;
        $this->id = $id;
        $this->fechaUltimoBoleto = date("m/Y");
    }


    public function cargarTarjeta($monto){
        $montosValidos = [150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 2000, 2500, 3000, 3500, 4000];
        if ($this->saldo + $monto < 6600){
            if (in_array($monto, $montosValidos)){
                $this->saldo += $monto;
        } 
        else {
            echo "El monto" . $monto . "no es valido para la recarga."; 
        }
        }        
    else {
        $this->saldoPendiente = $this->saldo + $monto - 6600;
        $this->saldo = 6600;
        }
    }

    private function determinarTarifa() {
        if ($this->fechaUltimoBoleto == date("m/Y")) {
            if ($this->viajes < 30) {
                return $this->tarifa;
            } elseif ($this->viajes < 80) {
                return $this->tarifa * 0.8;
            } else {
                return $this->tarifa * 0.75;
            }
        }else{
            $this->viajes = 0;
            return $this->tarifa;
        }
    }
    public function cobrarBoleto($tarifa) {
        $tarifa = $this->determinarTarifa();
        if ($tarifa !== null) {
            if ($this->saldo - $tarifa >= -211.84) {
                $this->saldo -= $tarifa;
                $this->viajes += 1;
                $this->fechaUltimoBoleto = date("m/Y");
                return true;
            } else {
                print 'Saldo insuficiente';
                return false;
            }
        }
        return false;
    }
}