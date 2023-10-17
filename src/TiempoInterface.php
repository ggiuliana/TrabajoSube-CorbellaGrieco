<?php
namespace TrabajoSube;
interface TiempoInterface {
    public function tiempo();
}

class Tiempo implements TiempoInterface {
    public function tiempo(){
        return time();
    }
}