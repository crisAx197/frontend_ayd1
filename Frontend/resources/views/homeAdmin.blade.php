<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal</title>
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
            max-width: 600px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff; 
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #000; 
        }
        .button-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            justify-content: center;
        }
        .action-button {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            transition: background-color 0.3s ease;
        }
        .action-button:hover {
            background-color: #0056b3;
        }
        .action-button i {
            margin-right: 10px;
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
        <h1>Menú Principal</h1>

        <div class="button-container">
            <button class="action-button">
                <i class="fas fa-clock"></i>
                Cargar Horario
            </button>

            <button class="action-button">
                <i class="fas fa-search"></i>
                Consultar Tasa de Desasignación
            </button>

            <button class="action-button">
                <i class="fas fa-file-alt"></i>
                Consultar Actas
            </button>

            <button class="action-button">
                <i class="fas fa-check"></i>
                Consultar Aprobaciones
            </button>

            <button class="action-button">
                <i class="fas fa-users"></i>
                Consultar Estudiantes Asignados
            </button>

            <button class="action-button">
                <i class="fas fa-user-tie"></i>
                Consultar Docente
            </button>

            <button class="action-button">
                <i class="fas fa-user-graduate"></i>
                Consultar Estudiante
            </button>
        </div>
    </div>
</body>
</html>
