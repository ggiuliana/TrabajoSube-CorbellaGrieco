<?php
namespace TrabajoSube;

class FranquiciasParciales extends Tarjeta{
    public $tarifa = 60;
    public $tipo = "parcial";
    public $ultimoBoleto;
    public $boletosDiarios = 4; 

    function __construct(){
    parent::__construct($saldo = 0, $id =0);
    $this->ultimoBoleto = time()-300;
    }

    
    public function cobrarBoleto(){
        if ((($this->saldo-$this->tarifa) >= -211.84) && (time()-$this->ultimoBoleto >= 300)){
            $this->saldo-=$this->tarifa;
            $this->ultimoBoleto = time();   
            return true;
        }
        else {
             print 'Saldo insuficiente';
            return false;
        }
    }
}