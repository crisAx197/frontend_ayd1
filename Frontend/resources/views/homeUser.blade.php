<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
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
    <h1 id="title-outside">Consultas y Solicitudes</h1>

    <div class="container">
        <div class="button-container">
            <div class="action-buttons-container">
                <div class="action-button" onclick="window.location.href='/asignar'">
                    <i class="fas fa-tasks action-button-icon"></i> 
                    Asignaciones
                </div>
                <div class="action-button" onclick="consultarPensum()">
                    <i class="fas fa-trash-alt action-button-icon"></i> 
                    Desasignaciones
                </div>
                <div class="action-button" onclick="window.location.href='/carreras/cursos'">
                    <i class="fas fa-book action-button-icon"></i> 
                    Consultar Pensum
                </div>
                <div class="action-button" onclick="generarCertificado()">
                    <i class="fas fa-certificate action-button-icon"></i> 
                    Generar Certificado de Cursos Aprobados
                </div>
                <div class="action-button" onclick="cargarHorario()">
                    <i class="far fa-calendar-alt action-button-icon"></i> 
                    Cargar Horario
                </div>
                <div class="action-button" onclick="solicitarCambioCarrera()">
                    <i class="fas fa-exchange-alt action-button-icon"></i> 
                    Solicitar Cambio de Carrera
                </div>
                <div class="action-button" onclick="solicitarCarreraSimultanea()">
                    <i class="fas fa-university action-button-icon"></i> 
                    Solicitar Carrera Simultánea
                </div>
                <div class="action-button" onclick="solicitarEquivalencias()">
                    <i class="fas fa-exchange-alt action-button-icon"></i> 
                    Solicitar Equivalencias de Cursos
                </div>
                <div class="action-button" onclick="solicitarBajaEstudiante()">
                    <i class="fas fa-user-times action-button-icon"></i> 
                    Baja de Estudiante
                </div>
            </div>
        </div>
    </div>

    <script>
        function asignaciones(){
            window.location.href='/asignar';
        }
        
        function desasignaciones(){
            window.location.href='/desasignar';
        }

        function consultarPensum() {
            window.location.href='/carreras/curso';
        }

        function generarCertificado() {
            window.location.href='/carreras/cambio';
        }

        function cargarHorario() {
            // 
        }

        function solicitarCambioCarrera() {
            window.location.href='/carreras/cambio';
        }

        function solicitarCarreraSimultanea() {
            // 
        }

        function solicitarEquivalencias() {
            // 
        }

        function solicitarBajaEstudiante() {
            window.location.href='/carreras/baja'; 
        }
    </script>
</body>
</html>
