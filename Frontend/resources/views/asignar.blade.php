<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignación de Curso</title>
    
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Asignación de Curso</h1>
        
        <!-- Mensaje de error -->
        @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
        @endif

        <form id="assignment-form" action="{{ route('course.assign') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="studentId">DPI del Estudiante:</label>
                <input type="text" id="studentId" name="studentId" placeholder="DPI" required>
            </div>
            <div class="form-group">
                <label for="courseId">Seleccionar Curso:</label>
                <select class="form-control" id="courseId" name="courseId" required>
                    <option value="" selected disabled>Selecciona un curso</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Asignar Curso</button>
        </form>
    </div>


    <script>
        fetch('http://localhost:3000/cursos/asignaciones')
            .then(response => response.json())
            .then(courses => {
                const courseSelect = document.getElementById('courseId');
                courses.forEach(course => {
                    const option = document.createElement('option');
                    option.value = course.Id;
                    option.textContent = `${course.Nombre} - Profesor: ${course.Profesor}`;
                    courseSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error al obtener los cursos:', error);
            });
    </script>
</body>
</html>
