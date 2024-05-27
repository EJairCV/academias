<?php

use App\Http\Controllers\CampoController;
use App\Http\Controllers\ClasesController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\UsuarioController;
use App\Models\Usuario;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('general.index');
})->name('general.inicio');


Route::get('/contacto', function () {
    return view('general.contact');
})->name('general.contacto');

Route::get('/jugadores', function () {
    return view('general.players');
})->name('general.jugadores');

Route::get('/partidos', function () {
    return view('general.matches');
})->name('general.partidos');




//rutas de login
Route::get('/login',[UsuarioController::class,'login'])->name('login');
Route::post('/login',[UsuarioController::class,'postLogin'])->name('login.postlogin');

//ALUMNOS
Route::get("/usuarios",UsuarioController::class)->name('usuarios');
//crearalumno
Route::get("/crearalumno",[UsuarioController::class,"crearAlumno"])->name('crear.alumno');
Route::post('/crearalumno',[UsuarioController::class,'postCrearAlumno'])->name('post.crear.alumno');
//modificar alumno
route::get("/alumno/{alumno}/modificar",[UsuarioController::class, "modificarAlumno"])->name('modificar.alumno');
route::put("/alumno/{alumno}/modificar",[UsuarioController::class, "putModificarAlumno"])->name('put.modificar.alumno');
//eliminar alumno
route::delete("/alumno/{alumno}/eliminar",[UsuarioController::class, "deleteAlumno"])->name('delete.alumno');

//DOCENTES
Route::get("/docentes",DocenteController::class)->name('docentes');
//creardocente
Route::get('/creardocente',[DocenteController::class,'crearDocente'])->name('crear.docente');
Route::post('/creardocente',[DocenteController::class,'postCrearDocente'])->name('post.crear.docente');
//modificar docente
Route::get('/docente/{docente}/modificar',[DocenteController::class,'modificarDocente'])->name('modificar.docente');
Route::put('/docente/{docente}/modificar',[DocenteController::class,'putModificarDocente'])->name('put.modificar.docente');
//eliminar docente
Route::delete('/docente/{docente}/eliminar',[DocenteController::class,'deleteDocente'])->name('delete.docente');

//SEDES
Route::get('/sedes',SedeController::class)->name('sedes');
//crearsede
Route::get('/crearsede',[SedeController::class,'crearSede'])->name('crear.sede');
Route::post('/crearsede',[SedeController::class,'postCrearSede'])->name('post.crear.sede');
//modificar sede
Route::get('/sede/{sede}/modificar',[SedeController::class,'modificarSede'])->name('modificar.sede');
Route::put('/sede/{sede}/modificar',[SedeController::class,'putModificarSede'])->name('put.modificar.sede');
//eliminar sede
Route::delete('/sede/{sede}/eliminar',[SedeController::class,'deleteSede'])->name('delete.sede');




//materiales
Route::resource('material', MaterialController::class);

//clases
Route::resource('clase', ClasesController::class);
//
Route::resource('campo',CampoController::class);