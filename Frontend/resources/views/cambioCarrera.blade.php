<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitar Cambio de Carrera</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #111; 
            margin: 0;
            padding: 0;
            color: #fff; 
        }
        .container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff; 
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        #title-outside {
            text-align: center;
            margin-bottom: 20px;
            color: #fff; 
            font-size: 50px; 
        }
        #title-inside {
            text-align: center;
            margin-bottom: 20px;
            color: #000; 
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #000;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%; /* Se ajusta al ancho del contenedor */
            box-sizing: border-box; /* Se incluye el padding y el borde en el ancho */
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            #title-outside {
                font-size: 30px; 
            }
            .container {
                margin: 20px;
                padding: 10px; 
            }
            input[type="text"], input[type="number"], button[type="submit"] {
                width: 100%; 
                box-sizing: border-box; 
            }
        }
    </style>
</head>
<body>
    <h1 id="title-outside">Solicitar Cambio de Carrera</h1>
    <div class="container">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" required>
            </div>
            <div class="form-group">
                <label for="carrera_actual">Carrera Actual:</label>
                <input type="text" id="carrera_actual" name="carrera_actual" required>
            </div>
            <div class="form-group">
                <label for="creditos_acumulados">Créditos Acumulados:</label>
                <input type="number" id="creditos_acumulados" name="creditos_acumulados" required min="20">
            </div>
            <button type="submit">Enviar Solicitud</button>
    </div>
</body>
</html>
