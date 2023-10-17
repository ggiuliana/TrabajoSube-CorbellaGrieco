<?php 
namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class LineasInterurbanasTest extends TestCase{
    
    public function testBoletoInterurbano(){
        $tarjeta = new Tarjeta(184);
        $colectivo = new LineasInterurbanas(35/9);
        $tarjeta->cobrarBoleto($colectivo->tarifa);
        $this->assertEquals(0, $tarjeta->saldo);
    }

    public function testMedioBoletoInterurbano(){
        $tarjeta = new FranquiciasParciales(92);
        $colectivo = new LineasInterurbanas(35/9);
        $tarjeta->cobrarBoleto($colectivo->tarifa);
        $this->assertEquals(0, $tarjeta->saldo);
    }

    public function testBEGInterurbano(){
        $tarjeta = new FranquiciaBEG(92);
        $colectivo = new LineasInterurbanas(35/9);
        $tarjeta->cobrarBoleto($colectivo->tarifa);
        $this->assertEquals(92, $tarjeta->saldo);
    }
}