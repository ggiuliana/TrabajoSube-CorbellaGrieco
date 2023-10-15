<?php
namespace TrabajoSube;
class Boleto{
    public $saldo;
    
    public function __construct($saldo){
        $this->saldo = $saldo;
    }
}