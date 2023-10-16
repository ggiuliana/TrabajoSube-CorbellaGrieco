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

    public function pagarCon($tarjeta){
        if($tarjeta->cobrarBoleto()){
          if ($tarjeta->saldoPendiente>0)
            $tarjeta->cargarTarjeta($tarjeta->saldoPendiente);
          $boleto = new Boleto($tarjeta->tipo, $this->linea, $tarjeta->tarifa, $tarjeta->saldo, $tarjeta->id);
          $boleto->ponerDescripcion();
          return $boleto;
        } else {
          return False;
        }
    }
}