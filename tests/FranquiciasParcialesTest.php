<?php 
namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class FranquiciasParcialesTest extends TestCase{

    public function testPuedePagaraConSaldo(){
        $tarjeta = new FranquiciasParciales(200);
        $colectivo = new Colectivo(103);
        $this->assertTrue($tarjeta->cobrarBoleto($colectivo->tarifa));
        $this->assertEquals(140, $tarjeta->saldo);
    }

    public function testPuedePagarConViajePlus(){
        $tarjeta = new FranquiciasParciales();
        $colectivo = new Colectivo(103);
        $this->assertTrue($tarjeta->cobrarBoleto($colectivo->tarifa));
        $this->assertEquals(-60, $tarjeta->saldo);
    }
    public function testNoViaja5Minutos(){
        $tarjeta = new FranquiciasParciales();
        $tarjeta->ultimoBoleto = time()-200;
        $colectivo = new Colectivo(103);
        $this->assertFalse($tarjeta->cobrarBoleto($colectivo->tarifa));
    }
    public function testNoMasDe4viajes(){
        $tarjeta = new FranquiciasParciales();
        $tarjeta->boletosDiarios=0;
        $colectivo = new Colectivo(103);
        $tarjeta->cobrarBoleto($colectivo->tarifa);
        $this->assertEquals(-120, $tarjeta->saldo);

    }
}
