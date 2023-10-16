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

    //Escribir un test que valide que si a una tarjeta se le carga un monto
    //que supere el máximo permitido, se acredite el saldo hasta alcanzar el 
    //máximo(6600) y que el excedente quede almacenado y pendiente de acreditación.
}
