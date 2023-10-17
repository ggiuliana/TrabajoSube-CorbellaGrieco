<?php
namespace TrabajoSube;

class TiempoFalso implements TiempoInterface {

    protected $tiempo;

    public function __construct($iniciarEn = 0){
        $this->tiempo = $iniciarEn;
    }

    public function avanzar($segundos){
        $this->tiempo += $segundos;
    }

    public function retroceder($dias){
        $this->tiempo -= (60*60*24*$dias);
        return $this->tiempo;
    }

    public function tiempo(){
        return $this->tiempo;
    }
}