<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Estudiantes Asignados</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #111; 
            margin: 0;
            padding: 0;
            color: #333; 
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff; 
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #000;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        #error-message {
            color: red;
        }
        #estudiantes-list {
            margin-top: 20px;
        }
    </style>    
</head>
<body>
    <div class="container">
        <h1>Consulta de Estudiantes Asignados</h1>
        <div class="form-group">
            <label for="asignacion-select">Seleccione una asignación:</label>
            <select class="form-control" id="asignacion-select">
                <!-- Options will be added dynamically with JavaScript -->
            </select>
        </div>
        <button id="consultar-estudiantes-btn" class="btn btn-primary">Consultar Estudiantes</button>
        <div id="error-message" class="error-message"></div>
        <div id="estudiantes-list">
            <!-- Students will be displayed here -->
        </div>
    </div>

    <script>
        async function cargarAsignaciones() {
            const asignacionSelect = document.getElementById('asignacion-select');
            asignacionSelect.innerHTML = '<option value="">Seleccionar asignación</option>';

            try {
                const response = await fetch('http://ec2-100-27-128-166.compute-1.amazonaws.com:3000/cursos/asignaciones/');
                if (!response.ok) {
                    throw new Error('Error al cargar las asignaciones');
                }
                const asignaciones = await response.json();
                asignaciones.forEach(asignacion => {
                    const option = document.createElement('option');
                    option.value = asignacion.Id;
                    option.textContent = `${asignacion.Nombre} - ${asignacion.Semestre}`;
                    asignacionSelect.appendChild(option);
                });
            } catch (error) {
                console.error('Error:', error.message);
                document.getElementById('error-message').textContent = error.message;
            }
        }

        async function consultarEstudiantes() {
            const asignacionId = document.getElementById('asignacion-select').value;
            if (!asignacionId) {
                document.getElementById('error-message').textContent = 'Seleccione una asignación';
                return;
            }

            try {
                const response = await fetch(`http://ec2-100-27-128-166.compute-1.amazonaws.com:3000/cursos/asignaciones/${asignacionId}/estudiantes`);
                if (!response.ok) {
                    throw new Error('Error al consultar los estudiantes por asignación');
                }
                const estudiantes = await response.json();
                mostrarEstudiantes(estudiantes);
            } catch (error) {
                console.error('Error:', error.message);
                document.getElementById('error-message').textContent = error.message;
            }
        }

        function mostrarEstudiantes(estudiantes) {
            const estudiantesList = document.getElementById('estudiantes-list');
            estudiantesList.innerHTML = ''; 
            if (estudiantes.length === 0) {
                estudiantesList.textContent = 'No hay estudiantes para esta asignación';
                return;
            }
            const estudiantesUl = document.createElement('ul');
            estudiantes.forEach(estudiante => {
                const estudianteLi = document.createElement('li');
                estudianteLi.textContent = `DPI: ${estudiante.DPI}, Nombre: ${estudiante.Nombre}, Carreras: ${estudiante.Carreras}, Estado: ${estudiante.Estado}, Nota: ${estudiante.Nota}`;
                estudiantesUl.appendChild(estudianteLi);
            });
            estudiantesList.appendChild(estudiantesUl);
        }

        window.addEventListener('DOMContentLoaded', cargarAsignaciones);

        document.getElementById('consultar-estudiantes-btn').addEventListener('click', consultarEstudiantes);
    </script>
</body>
</html>
