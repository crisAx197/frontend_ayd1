<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #111; 
            margin: 0;
            padding: 0;
            color: #fff; 
        }
        .register-link {
            margin-top: 20px;
            text-align: center;
        }

        .register-link a {
            color: #007bff;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
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
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type="text"],
        input[type="password"] {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #eee; 
            color: #111; 
        }
        select {
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
        @media (max-width: 600px) {
        .container {
            width: 90%;
            margin: 50px auto; 
        }
        #title-outside {
            font-size: 32px; 
        }
    }
    </style>
</head>
<body>
    <h1 id="title-outside">LOGIN</h1>
    <div class="container">
        <form method="POST" action="{{ route('login') }}"> 
            @csrf
            <input type="text" name="carnet" placeholder="Carnet" required>
            <input type="password" name="password" placeholder="Contraseña" required>

            <button type="submit">Iniciar sesión</button>
            
            <div class="register-link" style="color: #000;"> 
                ¿No tienes una cuenta? <a href="{{ route('role') }}">Regístrate aquí</a>
            </div>

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
