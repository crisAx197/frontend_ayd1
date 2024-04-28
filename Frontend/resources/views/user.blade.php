<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Estudiante</title>
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
            display: flex;
            flex-direction: column;
            align-items: center; 
        }

        #title-inside {
            text-align: center;
            margin-bottom: 20px;
            color: #000; 
        }

        form {
            width: 100%; 
            display: flex;
            flex-direction: column;
            align-items: center; 
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="tel"],
        input[type="number"],
        select,
        label {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            width: 90%;
            box-sizing: border-box; 
            color: #111;
            display: block;
        }

        input[type="date"] {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #eee;
            color: #111; 
            width: 90%;
            box-sizing: border-box; 
        }

        button[type="submit"] {
            background-color: #111; 
            color: #fff; 
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 90%; 
        }

        button[type="submit"]:hover {
            background-color: #333;
        }

        .error {
            color: red;
            margin-top: 5px;
            width: 90%; 
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
        <h1 id="title-inside">Registro de Estudiante</h1>
        <form method="POST" action="{{ route('registerStudent') }}">
            @csrf
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <label for="fecha_nacimiento">Fecha de nacimiento</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
            <input type="tel" name="telefono" placeholder="Teléfono" required>
            <input type="number" name="dpi" placeholder="DPI" required>
            <input type="text" name="direccion" placeholder="Dirección" required>
            <select name="carrera" required>
                <option value="" selected disabled>Selecciona la carrera</option>
            </select>
            <button type="submit">Registrar</button>
        </form>
    </div>
    <script>
        const carreraSelect = document.querySelector('select[name="carrera"]');

        fetch('http://ec2-100-27-128-166.compute-1.amazonaws.com:3000/carreras')
            .then(response => response.json())
            .then(carreras => {
                carreras.forEach(carrera => {
                    const option = document.createElement('option');
                    option.value = carrera.Id;
                    option.textContent = carrera.Nombre;
                    carreraSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error al obtener las carreras:', error);
            });
    </script>
</body>
</html>
