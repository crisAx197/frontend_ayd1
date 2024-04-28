<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME PROFESOR</title>
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
        #title-inside {
            text-align: center;
            margin-bottom: 20px;
            color: #000; 
        }
        .action-buttons-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .action-button {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center; /* Alinea el contenido horizontalmente */
            text-align: center; /* Asegura que el texto esté centrado */
        }
        .action-button:hover {
            background-color: #0056b3;
        }
        .action-button-icon {
            margin-right: 10px;
        }
        .button-container {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            background-color: #f9f9f9;
        }

        @media (max-width: 768px) {
            #title-outside {
                font-size: 30px; 
            }
            .container {
                margin: 20px;
                padding: 10px; 
            }
            input[type="text"], button[type="submit"] {
                width: 100%; 
                box-sizing: border-box; 
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 id="title-inside">Panel de Control del Profesor</h1>
        <div class="action-buttons-container">
            <a href="{{ route('notas') }}" class="action-button">
                <i class="fas fa-edit action-button-icon"></i>
                Ingresar Notas
            </a>

            <a href="{{ route('generarActa') }}" class="action-button">
                <i class="fas fa-file-alt action-button-icon"></i>
                Generar Acta
            </a>
        </div>
    </div>
</body>
</html>
