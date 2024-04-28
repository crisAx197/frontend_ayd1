<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desasignación de Curso</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        <h1>Desasignación de Curso</h1>
        <form id="unassign-form" action="{{ route('course.unassign') }}" method="POST">
            @csrf 
            <div class="form-group">
                <label for="courseId">ID del Curso:</label>
                <select class="form-control" id="courseId" name="courseId" required>
                    <option value="" selected disabled>Selecciona un curso</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Desasignar</button>
        </form>
    </div>

    <script>
        function refreshCourses(dpi) {
            console.log('DPI del estudiante:', dpi);
            fetch(`http://localhost:3000/usuarios/estudiantes/${dpi}/cursos/`)
                .then(response => response.json())
                .then(courses => {
                    const courseSelect = document.getElementById('courseId');
                    courseSelect.innerHTML = ''; 
                    courses.forEach(course => {
                        const option = document.createElement('option');
                        option.value = course.AsignacionID;
                        option.textContent = `${course.Codigo} - ${course.Nombre} - Profesor: ${course.Catedratico}`;
                        courseSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error al obtener los cursos:', error);
                });
        }

        window.onload = function() {
            const dpi = '{{ $id }}'; 
            refreshCourses(dpi);
        };
    </script>

</body>
</html>
