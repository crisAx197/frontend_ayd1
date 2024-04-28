<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Docente</title>
    
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
        #docente-info {
            margin-top: 20px;
        }
        .error-message {
            color: red;
        }
        .teacher-info {
            margin-top: 10px;
        }
    </style>    
</head>
<body>
    <div class="container">
        <h1>Consultar Docente</h1>
        <form id="consultar-form">
            <div class="form-group">
                <label for="dpi">Ingrese el DPI del docente:</label>
                <input type="text" class="form-control" id="dpi" name="dpi" required>
            </div>
            <button type="submit" class="btn btn-primary">Consultar</button>
        </form>
        <div id="docente-info"></div>
        <div id="error-message" class="error-message"></div>
        <button onclick="window.location.href='/homeUser'" class="btn btn-secondary mt-3">Regresar a Home</button>
    </div>

    <script>
        document.getElementById('consultar-form').addEventListener('submit', function(event) {
            event.preventDefault();
            const dpi = document.getElementById('dpi').value;
            console.log('Consultar docente con DPI:', dpi);

            fetch(`http://localhost:3000/usuarios/profesores/${dpi}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('No se encontró el docente con DPI ' + dpi);
                    }
                    return response.json();
                })
                .then(teacher => {
                    const docenteInfoDiv = document.getElementById('docente-info');
                    docenteInfoDiv.innerHTML = `
                        <div class="teacher-info">
                            <h4>Información del Docente</h4>
                            <p><strong>Nombre:</strong> ${teacher.Nombre}</p>
                            <p><strong>Email:</strong> ${teacher.Email}</p>
                            <p><strong>Fecha de Nacimiento:</strong> ${teacher.Fecha_nacimiento}</p>
                            <p><strong>Dirección:</strong> ${teacher.Direccion}</p>
                            <p><strong>Teléfono:</strong> ${teacher.Telefono}</p>
                            <p><strong>DPI:</strong> ${teacher.DPI}</p>
                            <p><strong>Registro Personal:</strong> ${teacher.Registro_personal}</p>
                            <p><strong>Creado en:</strong> ${teacher.Creado_en}</p>
                        </div>
                    `;
                    document.getElementById('error-message').textContent = '';
                })
                .catch(error => {
                    console.error('Error al consultar el docente:', error);
                    document.getElementById('docente-info').innerHTML = '';
                    document.getElementById('error-message').textContent = error.message;
                });
        });
    </script>

</body>
</html>
