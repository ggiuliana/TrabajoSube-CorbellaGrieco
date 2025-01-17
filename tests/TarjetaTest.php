<?php 
namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase{

    public function testCargar(){
        $montosValidos = [150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 2000, 2500, 3000, 3500, 4000];

        foreach ($montosValidos as $monto){
        $tarjeta = new Tarjeta();
        $tarjeta->cargarTarjeta($monto);
        $this->assertEquals($monto, $tarjeta->saldo);
        }   
    }

    public function testCobrarBoletoConSaldo(){
        $tarjeta = new Tarjeta(200);
        $colectivo = new Colectivo(103);
        $this->assertTrue($tarjeta->cobrarBoleto($colectivo->tarifa));
        $this->assertEquals(80, $tarjeta->saldo);
    }

    public function testCobrarBoletoSinSaldo() {
        $tarjeta = new Tarjeta(-100);
        $colectivo = new Colectivo(103);
        $this->assertFalse($tarjeta->cobrarBoleto($colectivo->tarifa));
        $this->assertEquals(-100, $tarjeta->saldo);
    }

    public function testViajePlus(){
        $tarjeta = new Tarjeta(20);
        $colectivo = new Colectivo(103);
        $this->assertTrue($tarjeta->cobrarBoleto($colectivo->tarifa));
        $this->assertEquals(-100, $tarjeta->saldo);
    }

    public function testSaldoPendiente(){
        $tarjeta = new Tarjeta(6500);
        $tarjeta->cargarTarjeta(600);
        $this->assertEquals(500, $tarjeta->saldoPendiente);
        $this->assertEquals(6600, $tarjeta->saldo);
    }

    public function testAcreditarSaldoPendiente(){
        $cole = new Colectivo(103);
        $tarjeta = new Tarjeta(6500);
        $tarjeta->cargarTarjeta(600);
        $boleto = $cole->pagarCon($tarjeta);
        $this->assertEquals(6600,$tarjeta->saldo);
    }

    public function testSinDescuento(){
        $tarjeta = new Tarjeta(200);
        $tarjeta->viajes=2;
        $colectivo = new Colectivo(103);
        $tarjeta->cobrarBoleto($colectivo->tarifa);
        $this->assertEquals(80, $tarjeta->saldo);
    }

    public function test20DeDescuento(){
        $tarjeta = new Tarjeta(200);
        $tarjeta->viajes=35;
        $colectivo = new Colectivo(103);
        $tarjeta->cobrarBoleto($colectivo->tarifa);
        $this->assertEquals(104, $tarjeta->saldo);
    }

    public function test25DeDescuento(){
        $tarjeta = new Tarjeta(200);
        $tarjeta->viajes=90;
        $colectivo = new Colectivo(103);
        $tarjeta->cobrarBoleto($colectivo->tarifa);
        $this->assertEquals(110, $tarjeta->saldo);
    }
    public function testResetViajes(){
        $tarjeta = new Tarjeta(200);
        $tiempoFalso = new TiempoFalso;
        $tarjeta->viajes=20;
        $tarjeta->fechaUltimoBoleto = $tiempoFalso->retroceder(30);
        $colectivo = new Colectivo(103);
        $tarjeta->cobrarBoleto($colectivo->tarifa);
        $this->assertEquals(1, $tarjeta->viajes);
    }
}
