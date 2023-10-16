<?php
namespace TrabajoSube;
class Boleto{
    public $fecha;
    public $tipoTarjeta;
    public $linea;
    public $abono;
    public $saldo;
    public $id;
    public $descripcion;
    
    public function __construct($tipoTarjeta, $linea, $abono, $saldo, $id){
        $this->fecha = date("d/m/Y H:i:s");
        $this->tipoTarjeta = $tipoTarjeta;
        $this->linea = $linea;
        $this->abono = $abono;
        $this->saldo = $saldo;
        $this->id = $id;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function getTipo(){
        return $this->tipoTarjeta;
    }
    public function getLinea(){
        return $this->linea;
    }
    public function getAbono(){
        return $this->abono;
    }
    public function getSaldo(){
        return $this->saldo;
    }
    public function getId(){
        return $this->id;
    }
    public function ponerDescripcion() {
        if($this->saldo < 0){
            $this->descripcion = "Abona saldo $" . $this->abono . ". (Saldo en negativo).";
        } else {
            $this->descripcion = "Abona saldo $" . $this->abono . ".";
        }
    }
}