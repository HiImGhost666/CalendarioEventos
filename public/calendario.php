<?php

require_once '../vendor/autoload.php';
require_once '../src/Ponente.php';
require_once '../src/Evento.php';
require_once '../src/GenerarCalendario.php';

use Carbon\Carbon;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $config = [
        'num_eventos' => intval($_POST['num_eventos']),
        'num_ponentes' => intval($_POST['num_ponentes']),
        'fecha_inicio' => $_POST['fecha_inicio'],
        'fecha_fin' => $_POST['fecha_fin']
    ];

    $generador = new GeneradorCalendario();
    $eventos = $generador->generarEventos($config);

    echo '<html>
    <head>
        <title>Calendario de Eventos</title>
        <style>
            body { font-family: Arial; margin: 20px; }
            table { border-collapse: collapse; width: 100%; }
            th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
            th { background-color: #eee; }
            .pasado { background-color: #ffe6e6; }
            .proximo { background-color: #e6ffe6; }
        </style>
    </head>
    <body>
        <h1>Calendario de Eventos</h1>
        
        <div style="background: #f5f5f5; padding: 10px; margin-bottom: 20px;">
            <h3>Configuración usada:</h3>
            <p>Eventos: '.$config['num_eventos'].' | Ponentes: '.$config['num_ponentes'].'</p>
            <p>Desde: '.$config['fecha_inicio'].' hasta: '.$config['fecha_fin'].'</p>
        </div>

        <table>
            <tr>
                <th>Fecha</th>
                <th>Título</th>
                <th>Ponente</th>
                <th>Estado</th>
            </tr>';

    foreach ($eventos as $evento) {
        $clase = $evento->yaPasado() ? 'pasado' : 'proximo';
        $estado = $evento->yaPasado() ? 'PASADO' : 'PRÓXIMO';
        
        echo '<tr class="'.$clase.'">
                <td>'.$evento->fecha->format('d/m/Y H:i').'</td>
                <td>'.htmlspecialchars($evento->titulo).'</td>
                <td>'.htmlspecialchars($evento->getPonenteNombreCompleto()).'</td>
                <td>'.$estado.'</td>
            </tr>';
    }

    echo '</table>
        <br>
        <a href="../index.php">Volver al formulario</a>
    </body>
    </html>';

} else {
    header('Location: ../index.php');
    exit;
}