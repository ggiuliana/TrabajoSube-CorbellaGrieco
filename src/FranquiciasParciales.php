<?php
namespace TrabajoSube;

class FranquiciasParciales extends Tarjeta{
    public $porcentajeTarifa = 0.5; // 50%
    public $tipo = "parcial";
    public $ultimoBoleto;
    public $boletosDiarios = 4; 

    function __construct($saldo = 0, $id =0){
        $this->saldo = $saldo;
        $this->id = $id;
        $this->ultimoBoleto = time()-300;
    }

    public function cobrarBoleto($tarifa){
        if ($this->boletosDiarios>0){
            if(date("d/m/Y", $this->ultimoBoleto) == date("d/m/Y")){
                if ((($this->saldo-($tarifa * $this->porcentajeTarifa)) >= -211.84) && time()-$this->ultimoBoleto >= 300){
                    $this->saldo-=$tarifa * $this->porcentajeTarifa;
                    $this->ultimoBoleto = time();   
                    $this->boletosDiarios-=1;                
                    return true;
                } else {
                    print 'No es posible realizar el pago';
                    return false;
                } 
            }
            else{
                if ((($this->saldo-($tarifa * $this->porcentajeTarifa)) >= -211.84)){
                    $this->boletosDiarios = 3;
                    $this->saldo-=$tarifa * $this->porcentajeTarifa;
                    $this->ultimoBoleto = time();
                    return true;
                }else {
                    print 'No es posible realizar el pago';
                    return false;
                }  
            }
        }
        else { if ($this->saldo-$tarifa >= -211.84) {
                $this->saldo-=$tarifa;
                $this->ultimoBoleto = time();   
                return true;
            }else {
                print 'No es posible realizar el pago';
                return false;
            } 
        } 
    }         
}