<?php
namespace TrabajoSube;
class Tarjeta{
    protected $id;
    public $saldo;
    
    public function __construct($id, $saldo){
        $this->id = $id;
        $this->saldo = $saldo;
    }
}