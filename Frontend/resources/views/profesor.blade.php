<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Profesores</title>
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
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        #title-inside {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="tel"],
        input[type="number"],
        label {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
            color: #333;
            display: block;
        }
        input[type="date"] {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #eee;
            color: #333;
            width: 100%;
            box-sizing: border-box;
        }
        button[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        button[type="submit"]:hover {
            background-color: #555;
        }
        .error {
            color: red;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 id="title-inside">Registrar docente</h1>
        <form method="POST" action="{{ route('registerProfesor') }}">
            @csrf
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <label for="fecha_nacimiento">Fecha de nacimiento</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
            <input type="tel" name="telefono" placeholder="Teléfono" required>
            <input type="number" name="dpi" placeholder="DPI" required>
            <input type="text" name="direccion" placeholder="Dirección" required>
            <button type="submit">Registrar</button>
            @if ($errors->any())
                <div class="error">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </form>
    </div>
</body>
</html>

