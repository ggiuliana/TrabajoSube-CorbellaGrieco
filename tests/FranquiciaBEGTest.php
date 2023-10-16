<?php 
namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class FranquiciaBEGTest extends TestCase{
    public function test2ViajesDiarios(){
        $tarjeta = new FranquiciaBEG();
        $tarjeta->boletosDiarios = 0;
        $tarjeta->cobrarBoleto();
        $this->assertEquals(-120, $tarjeta->saldo);
    }
}