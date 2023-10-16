<?php
namespace TrabajoSube;

class FranquiciasParciales extends Tarjeta{
    public $tarifa = 60;
    public $tipo = "parcial";
    public $ultimoBoleto;
    public $boletosDiarios = 4; 

    function __construct($saldo = 0, $id =0){
    //parent::__construct($saldo = 0, $id =0);
    $this->ultimoBoleto = time()-300;
    }

    public function cobrarBoleto(){
        if ($this->boletosDiarios>0){
            if(date("d/m/Y", $this->ultimoBoleto) == date("d/m/Y")){
                if ((($this->saldo-$this->tarifa) >= -211.84) && time()-$this->ultimoBoleto >= 300){
                    $this->saldo-=$this->tarifa;
                    $this->ultimoBoleto = time();   
                    $this->boletosDiarios-=1;                
                    return true;
                } else {
                    print 'No es posible realizar el pago';
                    return false;
                } 
            }
            else{
                if ((($this->saldo-$this->tarifa) >= -211.84)){
                    $this->boletosDiarios = 3;
                    $this->saldo-=$this->tarifa;
                    $this->ultimoBoleto = time();
                    return true;
                }else {
                    print 'No es posible realizar el pago';
                    return false;
                }  
            }
        }
        else if ($this->saldo-$this->tarifa * 2 >= 211.84) {
                $this->saldo-=$this->tarifa * 2;
                $this->ultimoBoleto = time();   
                return true;
            }else {
                print 'No es posible realizar el pago';
                return false;
            }  
    }         
}