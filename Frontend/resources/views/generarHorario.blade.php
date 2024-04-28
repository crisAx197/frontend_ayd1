<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignación de Horario</title>
    
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
    </style>    
</head>
<body>
    <div class="container">
        <h1>Asignación de Horario</h1>
        <form id="horario-form">
            <div class="form-group">
                <label for="idAssignment">ID de la Asignación:</label>
                <input type="text" class="form-control" id="idAssignment" name="idAssignment" required>
            </div>
            <div class="form-group">
                <label for="horaInicio">Hora de Inicio:</label>
                <input type="time" class="form-control" id="horaInicio" name="horaInicio" required>
            </div>
            <div class="form-group">
                <label for="horaFin">Hora de Fin:</label>
                <input type="time" class="form-control" id="horaFin" name="horaFin" required>
            </div>
            <div class="form-group">
                <label for="edificio">Edificio:</label>
                <input type="text" class="form-control" id="edificio" name="edificio" required>
            </div>
            <div class="form-group">
                <label for="salon">Salón:</label>
                <input type="text" class="form-control" id="salon" name="salon" required>
            </div>
            <div class="form-group">
                <label>Días:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="lunes" name="lunes">
                    <label class="form-check-label" for="lunes">Lunes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="martes" name="martes">
                    <label class="form-check-label" for="martes">Martes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="miercoles" name="miercoles">
                    <label class="form-check-label" for="miercoles">Miércoles</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="jueves" name="jueves">
                    <label class="form-check-label" for="jueves">Jueves</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="viernes" name="viernes">
                    <label class="form-check-label" for="viernes">Viernes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="sabado" name="sabado">
                    <label class="form-check-label" for="sabado">Sábado</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <div id="error-message" class="error-message"></div>
    </div>

    <script>
        document.getElementById('horario-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const idAssignment = document.getElementById('idAssignment').value;
            const horaInicio = document.getElementById('horaInicio').value;
            const horaFin = document.getElementById('horaFin').value;
            const edificio = document.getElementById('edificio').value;
            const salon = document.getElementById('salon').value;
            const lunes = document.getElementById('lunes').checked;
            const martes = document.getElementById('martes').checked;
            const miercoles = document.getElementById('miercoles').checked;
            const jueves = document.getElementById('jueves').checked;
            const viernes = document.getElementById('viernes').checked;
            const sabado = document.getElementById('sabado').checked;

            const formatearHora = (hora) => {
                const hh = String(hora.split(':')[0]).padStart(2, '0');
                const mm = String(hora.split(':')[1]).padStart(2, '0');
                return `${hh}:${mm}:00`;
            };

            const data = {
                idAssignment: idAssignment,
                schedule: {
                    Hora_inicio: formatearHora(horaInicio),
                    Hora_fin: formatearHora(horaFin),
                    Edificio: edificio,
                    Salon: salon,
                    Dias: {
                        Lunes: lunes,
                        Martes: martes,
                        Miercoles: miercoles,
                        Jueves: jueves,
                        Viernes: viernes,
                        Sabado: sabado
                    }
                }
            };

            fetch(`http://localhost:3000/cursos/asignaciones/${idAssignment}/horario`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error al enviar los datos');
                }
                window.location.href = '/homeAdmin';
            })
            .catch(error => {
                console.error('Error:', error.message);
                document.getElementById('error-message').textContent = error.message;
                console.log(horaFin, horaInicio)
            });
        });
    </script>
</body>
</html>
