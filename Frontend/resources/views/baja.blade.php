<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Baja</title>
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
        input[type="text"], input[type="number"], textarea {
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
            width: 100%;
            box-sizing: border-box; 
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
        }
    </style>
</head>
<body>
    <h1 id="title-outside">Solicitud de Baja</h1>
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
                <label for="motivo">Motivo de la Baja:</label>
                <textarea id="motivo" name="motivo" rows="4" required></textarea>
            </div>
            <button type="submit">Enviar Solicitud</button>
    </div>
</body>
</html>
