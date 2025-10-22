<?php
    
    class Ponente{
        public function __construct(
            public string $titulo,
            public string $nombre,
            public string $apellido
        ){
            $this->titulo = $titulo;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
        }


        public function getNombreCompleto(){
            return $this->titulo . ' ' . $this->nombre . ' ' . $this->apellido;
        }
    }
?>