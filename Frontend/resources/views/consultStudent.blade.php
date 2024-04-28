<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Alumno</title>
    
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
        #alumno-info {
            margin-top: 20px;
        }
        .error-message {
            color: red;
        }
        .student-info {
            margin-top: 10px;
        }
    </style>    
</head>
<body>
    <div class="container">
        <h1>Consultar Alumno</h1>
        <form id="consultar-form">
            <div class="form-group">
                <label for="dpi">Ingrese el DPI del alumno:</label>
                <input type="text" class="form-control" id="dpi" name="dpi" required>
            </div>
            <button type="submit" class="btn btn-primary">Consultar</button>
        </form>
        <div id="alumno-info"></div>
        <div id="error-message" class="error-message"></div>
        <button onclick="window.location.href='/homeUser'" class="btn btn-secondary mt-3">Regresar a Home</button>
    </div>

    <script>
        document.getElementById('consultar-form').addEventListener('submit', function(event) {
            event.preventDefault();
            const dpi = document.getElementById('dpi').value;
            console.log('Consultar alumno con DPI:', dpi);

            fetch(`http://ec2-100-27-128-166.compute-1.amazonaws.com:3000/usuarios/estudiantes/${dpi}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('No se encontró el estudiante con DPI ' + dpi);
                    }
                    return response.json();
                })
                .then(student => {
                    const alumnoInfoDiv = document.getElementById('alumno-info');
                    alumnoInfoDiv.innerHTML = `
                        <div class="student-info">
                            <h4>Información del Alumno</h4>
                            <p><strong>DPI:</strong> ${student.DPI}</p>
                            <p><strong>Nombre:</strong> ${student.Nombre}</p>
                            <p><strong>Email:</strong> ${student.Email}</p>
                            <p><strong>Fecha de Nacimiento:</strong> ${student.Fecha_nacimiento}</p>
                            <p><strong>Dirección:</strong> ${student.Direccion}</p>
                            <p><strong>Teléfono:</strong> ${student.Telefono}</p>
                            <p><strong>Carreras:</strong> ${student.Carreras}</p>
                            <p><strong>Creditos:</strong> ${student.Creditos}</p>
                            <p><strong>Creado en:</strong> ${student.Creado_en}</p>
                        </div>
                    `;
                    document.getElementById('error-message').textContent = '';
                })
                .catch(error => {
                    console.error('Error al consultar el alumno:', error);
                    document.getElementById('alumno-info').innerHTML = '';
                    document.getElementById('error-message').textContent = error.message;
                });
        });
    </script>

</body>
</html>
