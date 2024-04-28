<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    public function registerProfesor(Request $request)
    {
        $nombre = strval($request->nombre);
        $email = strval($request->email);
        $password = strval($request->password);
        $fecha_nacimiento = strval($request->fecha_nacimiento);
        $telefono = strval($request->telefono);
        $direccion = strval($request->direccion);
        $dpi = intval($request->dpi);

        $response = Http::post('http://localhost:3000/usuarios/register', [
            'nombre' => $nombre,
            'email' => $email,
            'password' => $password,
            'fecha_nacimiento' => $fecha_nacimiento,
            'telefono' => $telefono,
            'dpi' => $dpi,
            'direccion' => $direccion,
            'rol' => 'profesor',
        ]);

        $data = $response->json();

        if ($response->successful()) {
            $status = $data['Status'];
            if ($status == 1) {
                Session::put('user_id', $data['Id']);
                return redirect('/homeProfesor');
            } else {
                Auth::logout();
                return Redirect::back()->withErrors(['error' => 'No se pudo registrar al docente'])->withInput();
            }
        } else {
            return Redirect::back()->withErrors(['error' => 'No se pudo registrar al docente..'])->withInput();
        }
    }

    public function registerStudent(Request $request)
    {
        $nombre = strval($request->nombre);
        $email = strval($request->email);
        $password = strval($request->password);
        $fecha_nacimiento = strval($request->fecha_nacimiento);
        $telefono = strval($request->telefono);
        $direccion = strval($request->direccion);
        $dpi = intval($request->dpi);
        $carrera = strval($request->carrera);

        $response = Http::post('http://localhost:3000/usuarios/register', [
            'nombre' => $nombre,
            'email' => $email,
            'password' => $password,
            'fecha_nacimiento' => $fecha_nacimiento,
            'telefono' => $telefono,
            'dpi' => $dpi,
            'direccion' => $direccion,
            'rol' => 'estudiante',
            'carrera' => $carrera,
        ]);

        $data = $response->json();

        if ($response->successful()) {
            $status = $data['Status'];
            if ($status == 1) {
                Session::put('Id', $data['Id']);
                return redirect('/homeUser');
            } else {
                Auth::logout();
                return Redirect::back()->withErrors(['error' => 'No se pudo registrar al estudiante'])->withInput();
            }
        } else {
            return Redirect::back()->withErrors(['error' => 'No se pudo registrar al estudiante..'])->withInput();
        }
    }
}
