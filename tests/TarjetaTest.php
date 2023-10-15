<?php 
namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase{

    public function testCargar(){
        $tarjeta = new Tarjeta();
        $montosValidos = [150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 2000, 2500, 3000, 3500, 4000];

        foreach ($montosValidos as $monto){
        $tarjeta->cargarTarjeta($monto);
        $this->assertEquals($monto, $tarjeta->saldo);
        }   
    }
}
