<?php

use Carbon\Carbon;

class Evento {
    public function __construct(
        public string $titulo,
        public string $descripcion,
        public Carbon $fecha,
        public Ponente $ponente
    ) {
        // Constructor con propiedades promocionadas - ya no necesitas asignar manualmente
    }

    public function yaPasado() {
        return $this->fecha->isPast();
    }

    public function getTiempoRelativo() {
        return $this->fecha->diffForHumans();
    }

    public function getPonenteNombreCompleto() {
        return $this->ponente->getNombreCompleto();
    }
}