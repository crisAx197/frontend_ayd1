<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
{
    public function CrearCurso(Request $request)
    {
        $codigo = intval($request->codigo);
        $nombre = strval($request->nombre);
        $creditos = intval($request->creditos);
        $requisito_creditos = intval($request->requisito_creditos);

        $response = Http::post('http://localhost:3000/cursos', [
            'Codigo' => $codigo,
            'Nombre' => $nombre,
            'Creditos' => $creditos,
            'Requisito_Creditos' => $requisito_creditos,
        ]);

        if ($response->successful()) {
            return Redirect::back()->with('success', 'Curso creado exitosamente.');
        } else {
            return Redirect::back()->with('error', 'Error al crear el curso.');
        }
    }

    public function courseAssignment(Request $request)
    {
        $studentId = $request->studentId;
        $courseId = intval($request->courseId);
    
        $response = Http::post("http://localhost:3000/usuarios/estudiantes/{$studentId}/cursos/asignar", [
            'Id_curso_asignacion' => $courseId,
        ]);
    
        if ($response->successful()) {
            return redirect('/homeUser');
        } else {
            return redirect()->back()->with('error', 'Error al asignar el curso.');
        }
    }    

    public function courseUnassignment(Request $request)
    {
        $courseId = $request->courseId; 
        $studentId = Session::get('Id');
    
        $response = Http::delete("http://localhost:3000/usuarios/estudiantes/{$studentId}/cursos/desasignar/{$courseId}");
    
        if ($response->successful()) {
            return redirect('/homeUser')->with('success', 'Curso desasignado exitosamente.');
        } else {
            return redirect()->back()->with('error', 'Error al desasignar el curso.');
        }
    }
    

}
