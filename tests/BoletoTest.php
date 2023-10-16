<?php 
namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase{
    public function testBoletoNormal() {
        $tarjeta = new Tarjeta(120);
        $colectivo = new Colectivo(128);
        $boleto = $colectivo->pagarCon($tarjeta);

        $this->assertEquals($boleto->getTipo(), "normal");
    }
}