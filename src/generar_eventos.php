<?php
use Carbon\Carbon;
require_once 'Evento.php';
require_once 'generar_ponentes.php';

function generarEventos($faker, $config) {
    $ponentes = generarPonentes($faker, $config['num_ponentes']);
    $eventos = [];

    for ($i = 0; $i < $config['num_eventos']; $i++) {
        $fecha = Carbon::instance($faker->dateTimeBetween(
            $config['fecha_inicio'], 
            $config['fecha_fin']
        ));
        
        $eventos[] = new Evento(
            $faker->realText(50),
            $faker->realText(150),
            $fecha,
            $faker->randomElement($ponentes)
        );
    }

    usort($eventos, function($a, $b) {
        return $a->fecha->gt($b->fecha) ? 1 : -1;
    });

    return $eventos;
}