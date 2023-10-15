<?php
namespace TrabajoSube;

class Colectivo{
    protected $linea;
    public $tarifa;
    
    public function __construct($tarifa, $linea){
        $this->tarifa = $tarifa;
        $this->linea = $linea;
    }
    
    
    public function getLinea(){
        return $this->linea;
    }

    public function pagar($tarjeta){
        $puedePagar = $tarjeta->cobrarBoleto();
        if($puedePagar){
          new Boleto($tarjeta->saldo);
        }
        return $puedePagar;
      }
}
