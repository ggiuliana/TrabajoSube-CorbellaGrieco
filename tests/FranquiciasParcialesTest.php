<?php 
namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class FranquiciasParcialesTest extends TestCase{

    public function testPuedePagaraConSaldo(){
        $tarjeta = new FranquiciasParciales();
        $tarjeta->cargarTarjeta(200);
        $this->assertTrue($tarjeta->cobrarBoleto());
        $this->assertEquals(140, $tarjeta->saldo);
    }

    public function testPuedePagarConViajePlus(){
        $tarjeta = new FranquiciasParciales();
        $this->assertTrue($tarjeta->cobrarBoleto());
        $this->assertEquals(-60, $tarjeta->saldo);
    }
    public function testNoViaja5Minutos(){
        $tarjeta = new FranquiciasParciales();
        $tarjeta->ultimoBoleto = time()-200;
        $this->assertFalse($tarjeta->cobrarBoleto());
    }
    public function testNoMasDe4viajes(){
        $tarjeta = new FranquiciasParciales();
        $tarjeta->boletosDiarios=0;
        $tarjeta->cobrarBoleto();
        $this->assertEquals(-120, $tarjeta->saldo);

    }
}
