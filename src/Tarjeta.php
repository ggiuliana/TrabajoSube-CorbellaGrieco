<?php
namespace TrabajoSube;

class Tarjeta{
    public $saldo;
    public $tarifa = 120;
    public $id;
    public $tipo = "normal";
    public $saldoPendiente;
    
    public function __construct($saldo = 0, $id =0){
        $this->saldo = $saldo;
        $this->id = $id;
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

    public function cobrarBoleto(){
        if (($this->saldo-$this->tarifa) >= -211.84){
          $this->saldo-=$this->tarifa;    
          return true;
        }
        else {
            print 'Saldo insuficiente';
            return false;
        }
    }
}