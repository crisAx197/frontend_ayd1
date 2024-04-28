<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Carrera</title>
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
        #title-outside {
            text-align: center;
            margin-bottom: 20px;
            color: #fff; 
            font-size: 50px; 
        }
        #title-inside {
            text-align: center;
            margin-bottom: 20px;
            color: #000; 
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type="text"] {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #eee; 
            color: #111;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            margin-top: 5px;
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
    <h1 id="title-outside"></h1>
    <div class="container">
    <h1 id="title-inside"> Crear Carrera </h1>
        <form method="POST" action="endpoint Carrera">
            <input type="text" name="nombre" placeholder="Nombre de la Carrera" required>
            <button type="submit">Crear Carrera</button>
        </form>
        @if (session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif
    </div>
</body>
</html>
