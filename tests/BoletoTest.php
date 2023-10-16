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
    public function testFranquiciasCompletas() {
        $tarjeta = new FranquiciasCompletas();
        $colectivo = new Colectivo(128);
        $boleto = $colectivo->pagarCon($tarjeta);

        $this->assertEquals($boleto->getTipo(), "completa");
    }
    public function testFranquiciasParciales() {
        $tarjeta = new FranquiciasParciales(60);
        $colectivo = new Colectivo(128);
        $boleto = $colectivo->pagarCon($tarjeta);

        $this->assertEquals($boleto->getTipo(), "parcial");
    }
}