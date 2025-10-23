<?php

require_once '../vendor/autoload.php';
use Carbon\Carbon;
require_once 'Ponente.php';
require_once 'Evento.php';
require_once 'generar_ponentes.php';
require_once 'generar_eventos.php';

class GeneradorCalendario {
    private $faker;

    public function __construct() {
        $this->faker = Faker\Factory::create('es_ES');
    }

    public function generarEventos($config) {
        return generarEventos($this->faker, $config);
    }

    private function generarPonentes($cantidad) {
        return generarPonentes($this->faker, $cantidad);
    }
}