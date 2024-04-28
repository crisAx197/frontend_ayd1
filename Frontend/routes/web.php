<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Login 

Route::get('/', function () {
    return view('login');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/role', [RoleController::class, 'index'])->name('role');

// crear carrera
Route::get('/carreras', function () {
    return view('carrera');
});

// Registrar Estudiante
Route::get('/usuarios/estudiantes', function () {
    return view('user');
})->name('registro_estudiante');

Route::post('/register/student', [RegisterController::class, 'registerStudent'])->name('registerStudent');

//Registrar Docente 
Route::get('/usuarios/profesores', function () {
    return view('profesor');
})->name('registro_profesor');

Route::post('/register/profesor', [RegisterController::class, 'registerProfesor'])->name('registerProfesor');

// crear curso
Route::get('/cursos', function () {
    return view('curso');
});

Route::post('/crear_curso', [CourseController::class, 'CrearCurso'])->name('crearCurso');

// Dashboard Estudiantes

Route::get('/homeUser', function () {
    return view('homeUser');
});

// Asignar Curso

Route::get('/asignar', function () {
    return view('asignar');
});

Route::post('/asignar', [CourseController::class, 'courseAssignment'])->name('course.assign');


// Desasignar Curso

Route::get('/desasignar', function () {
    $id = Session::get('Id');
    return view('desasignar', ['id' => $id]);
});

Route::post('/desasignar', [CourseController::class, 'courseUnassignment'])->name('course.unassign');


// Consultar estudiante

Route::get('/consultarEstudiante', function (){
    return view('consultStudent');
});


// Consultar Docente

Route::get('/consultarDocente', function (){
    return view('consultProfessor');
});

// Consultar Pensum

Route::get('/consultarPensum', function (){
    return view('consultPensum');
});

// home profesores

Route::get('/homeProfesor', function () {
    return view('homeProfesor');
});

Route::get('/usuarios/profesores/notas', function () {
    return view('notas');
})->name('notas');

Route::get('/usuarios/profesores/actas', function () {
    return view('generarActa');
})->name('generarActa');

// Cambio Carrera 
Route::get('/carreras/cambio', function () {
    return view('cambioCarrera');
});

// Baja de Estudiante 
Route::get('/carreras/baja', function () {
    return view('baja');
});


// Home Admin
Route::get('/homeAdmin', function () {
    return view('homeAdmin');
});


// Generar Horario
Route::get('/generarHorario', function (){
    return view('generarHorario');
});

// Conusltar Asignados
Route::get('/Asignados', function (){
    return view('consultarAsignados');
});