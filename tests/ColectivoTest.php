<?php 
namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase{

    public function test(){
        $cole = new Colectivo(103);
        $this->assertEquals($cole->getLinea(), 103);
    }
    
}
