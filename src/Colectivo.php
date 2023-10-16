<?php
namespace TrabajoSube;

class Colectivo{
    protected $linea;
    
    public function __construct($linea){
        $this->linea = $linea;
    }
    
    
    public function getLinea(){
        return $this->linea;
    }

    public function pagar($tarjeta){
        $puedePagar = $tarjeta->cobrarBoleto();
        if($puedePagar){
          $boleto = new Boleto($tarjeta->saldo);
        }
        return $puedePagar;
      }
}
