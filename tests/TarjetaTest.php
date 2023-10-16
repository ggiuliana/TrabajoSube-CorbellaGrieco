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
        $this->assertTrue($tarjeta->cobrarBoleto());
        $this->assertEquals(80, $tarjeta->saldo);
    }

    public function testCobrarBoletoSinSaldo() {
        $tarjeta = new Tarjeta(-100);
        $this->assertFalse($tarjeta->cobrarBoleto());
        $this->assertEquals(-100, $tarjeta->saldo);
    }

    public function testViajePlus(){
        $tarjeta = new Tarjeta(20);
        $this->assertTrue($tarjeta->cobrarBoleto());
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

    //Escribir un test que valide que luego de realizar un viaje, verifique si hay saldo
    // pendiente de acreditación y recargue la tarjeta hasta llegar al máximo nuevamente.
}
