<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $response = Http::post('http://localhost:3000/usuarios/login', [
            'carnet' => $request->carnet,
            'password' => $request->password
        ]);
    
        $data = $response->json();
    
        if ($response->successful()) {
            $status = $data['Status'];
            if ($status == 1) {
                $type = $data['Type'];
                switch ($type) {
                    case 'estudiante':
                        Session::put('Id', $data['Id']);
                        return redirect('/homeUser');
                        break;
                    case 'profesor':
                        Session::put('Id', $data['Id']);
                        return redirect('/homeProfesor');
                        break;
                    case 'admin':
                        Session::put('Id', $data['Id']);
                        return redirect('/homeAdmin');
                        break;
                    default:
                        Auth::logout();
                        return Redirect::back()->withErrors(['error' => 'Tipo de usuario no válido'])->withInput();
                        break;
                }
            } else {
                Auth::logout();
                return Redirect::back()->withErrors(['error' => 'Credenciales inválidas'])->withInput();
            }
        } else {
            return Redirect::back()->withErrors(['error' => 'Credenciales inválidas'])->withInput();
        }
    }
    
}
