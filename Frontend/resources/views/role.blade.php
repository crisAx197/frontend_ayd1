<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rol de Registro</title>
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
        .role-buttons {
            display: flex;
            justify-content: center; 
            gap: 10px;
        }
        button {
            flex: 1;
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 600px) {
        .container {
            width: 90%;
            margin: 50px auto; 
        }
        #title-outside {
            font-size: 32px; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 id="title-inside">Seleccione su rol</h1>
        <div class="role-buttons">
            <button onclick="selectRole('estudiante')">Estudiante</button>
            <button onclick="selectRole('profesor')">Profesor</button>
        </div>
    </div>
    <script>
        function selectRole(role) {
            if (role === 'estudiante') {
                window.location.href = '{{ route("registro_estudiante") }}'; 
            } else if (role === 'profesor') {
                window.location.href = '{{ route("registro_profesor") }}'; 
            }
        }
    </script>
</body>
</html>
