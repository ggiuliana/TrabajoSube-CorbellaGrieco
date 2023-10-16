<?php
namespace TrabajoSube;

class FranquiciaBEG extends FranquiciasCompletas{
    public $ultimoBoleto;
    public $boletosDiarios = 2;

    function __construct($saldo = 0, $id =0){
        $this->ultimoBoleto = time();
    }
    public function cobrarBoleto(){
        if ($this->boletosDiarios>0){
            if(date("d/m/Y", $this->ultimoBoleto) == date("d/m/Y")){
                $this->saldo-=$this->tarifa;
                $this->ultimoBoleto = time();   
                $this->boletosDiarios-=1;                
                return true;
            }
            else{
                $this->boletosDiarios = 1;
                $this->saldo-=$this->tarifa;
                $this->ultimoBoleto = time();
                return true;
            }
        }
        else if ($this->saldo-120 >= -211.84) {
                $this->saldo-=120;
                $this->ultimoBoleto = time();   
                return true;
        } else {
                print 'No es posible realizar el pago';
                return false;
            } 
    }
}