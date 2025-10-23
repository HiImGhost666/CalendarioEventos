<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Eventos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f0f0f0;
        }
        
        h1 {
            text-align: center;
            color: #333;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Generador de Eventos</h1>
    
    <form method="POST" action="calendario.php">
        <div class="form-group">
            <label for="num_eventos">Número de Eventos:</label>
            <input type="number" id="num_eventos" name="num_eventos" min="1" max="50" value="10" required>
        </div>
        
        <div class="form-group">
            <label for="num_ponentes">Número de Ponentes:</label>
            <input type="number" id="num_ponentes" name="num_ponentes" min="1" max="20" value="5" required>
        </div>
        
        <div class="form-group">
            <label for="fecha_inicio">Fecha de Inicio:</label>
            <input type="date" id="fecha_inicio" name="fecha_inicio" required>
        </div>
        
        <div class="form-group">
            <label for="fecha_fin">Fecha de Fin:</label>
            <input type="date" id="fecha_fin" name="fecha_fin" required>
        </div>

             <!-- Nuevo campo para formato de exportación -->
        <label for="formato">Formato de exportación:</label>
        <select id="formato" name="formato" required>
            <option value="html">Guardar como HTML</option>
            <option value="pdf">Guardar como PDF</option>
            <option value="csv">Guardar como CSV</option>
        </select>

        
        <button type="submit">Generar Calendario</button>
    </form>

    <script>
        // Fechas por defecto
        document.getElementById('fecha_inicio').valueAsDate = new Date();
        
        let fechaFin = new Date();
        fechaFin.setDate(fechaFin.getDate() + 30);
        document.getElementById('fecha_fin').valueAsDate = fechaFin;
    </script>
</body>
</html>