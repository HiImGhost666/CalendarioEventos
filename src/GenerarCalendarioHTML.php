<?php

class GenerarCalendarioHTML {
    public function exportar($eventos, $config) {
        header('Content-Type: text/html');
        header('Content-Disposition: attachment; filename="calendario_eventos.html"');
        
        ob_start();
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Calendario de Eventos</title>
            <style>
                body { font-family: Arial; margin: 20px; }
                table { border-collapse: collapse; width: 100%; }
                th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
                th { background-color: #eee; }
                .pasado { background-color: #ffe6e6; }
                .proximo { background-color: #e6ffe6; }
                .configuracion { background: #f5f5f5; padding: 10px; margin-bottom: 20px; }
            </style>
        </head>
        <body>
            <h1>Calendario de Eventos</h1>
            
            <div class="configuracion">
                <h3>Configuración usada:</h3>
                <p>Eventos: <?php echo $config['num_eventos']; ?> | Ponentes: <?php echo $config['num_ponentes']; ?></p>
                <p>Desde: <?php echo date('d-m-Y', strtotime($config['fecha_inicio'])); ?> hasta: <?php echo date('d-m-Y', strtotime($config['fecha_fin'])); ?></p>
                <p>Generado el: <?php echo date('d/m/Y H:i'); ?></p>
            </div>

            <table>
                <tr>
                    <th>Fecha</th>
                    <th>Título</th>
                    <th>Ponente</th>
                    <th>Estado</th>
                </tr>
                <?php foreach ($eventos as $evento): ?>
                    <?php
                    $clase = $evento->yaPasado() ? 'pasado' : 'proximo';
                    $estado = $evento->yaPasado() ? 'PASADO' : 'PRÓXIMO';
                    ?>
                    <tr class="<?php echo $clase; ?>">
                        <td><?php echo $evento->fecha->format('d/m/Y H:i'); ?></td>
                        <td><?php echo htmlspecialchars($evento->titulo); ?></td>
                        <td><?php echo htmlspecialchars($evento->getPonenteNombreCompleto()); ?></td>
                        <td><?php echo $estado; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </body>
        </html>
        <?php
        $html = ob_get_clean();
        echo $html;
        exit;
    }
}