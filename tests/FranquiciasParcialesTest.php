<?php 
namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class FranquiciasParcialesTest extends TestCase{

    public function testPuedePagaraConSaldo(){
        $tarjeta = new FranquiciasParciales(200);
        $this->assertTrue($tarjeta->cobrarBoleto());
        $this->assertEquals(140, $tarjeta->saldo);
    }

    public function testPuedePagarConViajePlus(){
        $tarjeta = new FranquiciasParciales(20);
        $this->assertTrue($tarjeta->cobrarBoleto());
        $this->assertEquals(-40, $tarjeta->saldo);
    }
    public function testNoViaja5Minutos(){
        $tarjeta = new FranquiciasParciales();
        $tarjeta->ultimoBoleto = time()-200;
        $this->assertFalse($tarjeta->cobrarBoleto());
    }
}
