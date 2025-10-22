<?php

require_once '../vendor/autoload.php';
use Carbon\Carbon;
require_once 'Ponente.php';
require_once 'Evento.php';

class GeneradorCalendario {
    private $faker;

    public function __construct() {
        $this->faker = Faker\Factory::create('es_ES'); // ← Español
    }

    public function generarEventos($config) {
        $ponentes = $this->generarPonentes($config['num_ponentes']);
        $eventos = [];
    
        for ($i = 0; $i < $config['num_eventos']; $i++) {
            $fecha = Carbon::instance($this->faker->dateTimeBetween(
                $config['fecha_inicio'], 
                $config['fecha_fin']
            ));
            
            $eventos[] = new Evento(
                $this->faker->realText(50), // ← Usa temas en español
                $this->faker->realText(150),         // ← Texto real en español
                $fecha,
                $this->faker->randomElement($ponentes)
            );
        }

        usort($eventos, function($a, $b) {
            return $a->fecha->gt($b->fecha) ? 1 : -1;
        });

        return $eventos;
    }

    private function generarPonentes($cantidad) {
        $ponentes = [];
        $titulos = ['Dr.', 'Dra.', 'Ing.', 'Lic.', 'Mtro.', 'Mtra.', 'Arq.'];
        
        for ($i = 0; $i < $cantidad; $i++) {
            $ponentes[] = new Ponente(
                $this->faker->randomElement($titulos),
                $this->faker->firstName(),
                $this->faker->lastName()
            );
        }
        
        return $ponentes;
    }
}