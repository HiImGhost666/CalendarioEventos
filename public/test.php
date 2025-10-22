<?php
// test.php - EN /public/
require_once '../vendor/autoload.php';
require_once '../src/Ponente.php';  
require_once '../src/Evento.php';
require_once '../src/GenerarCalendario.php';

echo "<!DOCTYPE html>
<html>
<head>
    <title>🧪 Test Generador Calendario</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .evento { border: 1px solid #ccc; padding: 15px; margin: 10px 0; border-radius: 5px; }
        .pasado { background-color: #f8f8f8; color: #888; }
        .futuro { background-color: #f0f8ff; }
        h1 { color: #333; }
    </style>
</head>
<body>";

echo "<h1>🧪 PROBANDO GENERADOR DE CALENDARIO</h1>";

$generador = new GeneradorCalendario();

$config = [
    'num_eventos' => 5,
    'num_ponentes' => 3,
    'fecha_inicio' => '2024-01-01',
    'fecha_fin' => '2024-12-31'
];

$eventos = $generador->generarEventos($config);

echo "<p><strong>Total de eventos generados:</strong> " . count($eventos) . "</p>";

foreach ($eventos as $i => $evento) {
    $clase = $evento->yaPasado() ? 'pasado' : 'futuro';
    
    echo "<div class='evento $clase'>";
    echo "<h3>📅 EVENTO " . ($i + 1) . "</h3>";
    echo "<p><strong>Título:</strong> " . $evento->titulo . "</p>";
    echo "<p><strong>Ponente:</strong> " . $evento->ponente->getNombreCompleto() . "</p>";
    echo "<p><strong>Fecha:</strong> " . $evento->fecha->format('d/m/Y H:i') . "</p>";
    echo "<p><strong>Estado:</strong> " . ($evento->yaPasado() ? '❌ YA PASÓ' : '✅ PRÓXIMO') . "</p>";
    echo "<p><strong>Tiempo relativo:</strong> " . $evento->getTiempoRelativo() . "</p>";
    echo "<p><strong>Descripción:</strong> " . $evento->descripcion . "</p>";
    echo "</div>";
}

echo "<p style='margin-top: 20px; padding: 10px; background: #d4edda; color: #155724; border-radius: 5px;'>
    ✅ <strong>TEST COMPLETADO</strong> - Si ves eventos, TODO FUNCIONA! 🎉
</p>";

echo "</body></html>";