<?php 
namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class FranquiciasCompletasTest extends TestCase{

    public function testPuedePagaraConSaldo(){
        $tarjeta = new FranquiciasCompletas(200);
        $this->assertTrue($tarjeta->cobrarBoleto());
        $this->assertEquals(200, $tarjeta->saldo);
    }

    public function testPuedePagarSinSaldo() {
        $tarjeta = new FranquiciasCompletas(-100);
        $this->assertTrue($tarjeta->cobrarBoleto());
        $this->assertEquals(-100, $tarjeta->saldo);
    }

    public function testPuedePagarConViajePlus(){
        $tarjeta = new FranquiciasCompletas(20);
        $this->assertTrue($tarjeta->cobrarBoleto());
        $this->assertEquals(20, $tarjeta->saldo);
    }
}
