<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Cursos por Carrera</title>
    
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
        #course-info {
            margin-top: 20px;
        }
        .error-message {
            color: red;
        }
        .course-info {
            margin-top: 10px;
        }
    </style>    
</head>
<body>
    <div class="container">
        <h1>Consultar Cursos por Carrera</h1>
        <form id="consultar-form">
            <div class="form-group">
                <label for="carrera">Seleccione una carrera:</label>
                <select class="form-control" id="carrera" name="carrera" required>
                    <option value="" selected disabled>Selecciona una carrera</option>
                  
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Consultar</button>
        </form>
        <div id="course-info"></div>
        <div id="error-message" class="error-message"></div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            
            fetch('http://localhost:3000/carreras')
                .then(response => response.json())
                .then(data => {
                    const carreraSelect = document.getElementById('carrera');
                    data.forEach(carrera => {
                        const option = document.createElement('option');
                        option.value = carrera.Id;
                        option.textContent = carrera.Nombre;
                        carreraSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error al obtener las carreras:', error);
                    document.getElementById('error-message').textContent = 'Error al cargar las carreras.';
                });
        });

        document.getElementById('consultar-form').addEventListener('submit', function(event) {
            event.preventDefault();
            const carreraId = document.getElementById('carrera').value;
            console.log('Consultar cursos de carrera con ID:', carreraId);

            fetch(`http://localhost:3000/carreras/${carreraId}/cursos`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('No se encontraron cursos para esta carrera.');
                    }
                    return response.json();
                })
                .then(courses => {
                    const courseInfoDiv = document.getElementById('course-info');
                    courseInfoDiv.innerHTML = ''; 
                    courses.forEach(course => {
                        const courseDiv = document.createElement('div');
                        courseDiv.classList.add('course-info');
                        courseDiv.innerHTML = `
                            <h4>Curso:</h4>
                            <p><strong>Código:</strong> ${course.Codigo}</p>
                            <p><strong>Nombre:</strong> ${course.Nombre}</p>
                            <p><strong>Requisito de Créditos:</strong> ${course.Requisito_creditos}</p>
                            <p><strong>Semestre:</strong> ${course.Semestre}</p>
                            <p><strong>Prerequisitos:</strong> ${course.Prerequisitos}</p>
                            <hr>
                        `;
                        courseInfoDiv.appendChild(courseDiv);
                    });
                    document.getElementById('error-message').textContent = ''; 
                })
                .catch(error => {
                    console.error('Error al consultar los cursos:', error);
                    document.getElementById('course-info').innerHTML = ''; 
                    document.getElementById('error-message').textContent = error.message;
                });
        });
    </script>

</body>
</html>
