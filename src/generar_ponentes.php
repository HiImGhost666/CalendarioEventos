<?php

require_once 'Ponente.php';

function generarPonentes($faker, $cantidad) {
    $ponentes = [];
    $titulos = ['Dr.', 'Dra.', 'Ing.', 'Lic.', 'Mtro.', 'Mtra.', 'Arq.'];
    
    for ($i = 0; $i < $cantidad; $i++) {
        $ponentes[] = new Ponente(
            $faker->randomElement($titulos),
            $faker->firstName(),
            $faker->lastName()
        );
    }
    
    return $ponentes;
}