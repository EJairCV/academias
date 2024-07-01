<?php

use App\Http\Controllers\CampoController;
use App\Http\Controllers\ClasesController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\General;
use App\Http\Controllers\TipoEventoController;
use App\Models\Usuario;
use Illuminate\Support\Facades\Route;


//autemtficacion
Route::post('loginauth', [AuthController::class, 'login'])->name('loginauth');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');







Route::get('/contacto', function () {
    return view('general.contact');
})->name('general.contacto');

Route::get('/jugadores',[General::class, 'jugadores'])->name('general.jugadores');
Route::get('/partidos',[General::class, 'partidos'])->name('general.partidos');
Route::get('/',[General::class, 'inicio'])->name('general.inicio');



//rutas de login
Route::get('/login',[UsuarioController::class,'login'])->name('login');
Route::post('/login',[UsuarioController::class,'postLogin'])->name('login.postlogin');
//autentificacion alumno
Route::middleware('auth:Alumno')->group(function(){
//datos personales del alumno
Route::get("/datosdealumno",[UsuarioController::class,"VistaAlumno"])->name('vista.alumno');
});

//autentificacion
Route::middleware('auth:Administrador,Docente')->group(function(){
//ALUMNOS
Route::get("/usuarios",UsuarioController::class)->name('usuarios');
//crearalumno
Route::get("/registraralumno",[UsuarioController::class,"crearAlumno"])->name('crear.alumno');
Route::post('/crearalumno',[UsuarioController::class,'postCrearAlumno'])->name('post.crear.alumno');
//modificar alumno
route::get("/alumno/{alumno}/modificar",[UsuarioController::class, "modificarAlumno"])->name('modificar.alumno');
route::put("/alumno/{alumno}/modificar",[UsuarioController::class, "putModificarAlumno"])->name('put.modificar.alumno');
//
Route::put('/alumnos/{id}/notas', [UsuarioController::class, 'updateNotas'])->name('update.notas');
//buscar alumnos
Route::post('/buscaralumno',[UsuarioController::class,'buscarAlumno'])->name('post.buscar.alumno');
//eliminar alumno
route::delete("/alumno/{alumno}/eliminar",[UsuarioController::class, "deleteAlumno"])->name('delete.alumno');

//DOCENTES
Route::get("/docentes",DocenteController::class)->name('docentes');

//buscardocentes
Route::post('/buscardocente',[DocenteController::class,'buscarDocente'])->name('post.buscar.docente');

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
//buscar sede
Route::post('/buscarsede',[SedeController::class,'buscarSede'])->name('post.buscar.sede');
//modificar sede
Route::get('/sede/{sede}/modificar',[SedeController::class,'modificarSede'])->name('modificar.sede');
Route::put('/sede/{sede}/modificar',[SedeController::class,'putModificarSede'])->name('put.modificar.sede');
//eliminar sede
Route::delete('/sede/{sede}/eliminar',[SedeController::class,'deleteSede'])->name('delete.sede');


//materiales
Route::resource('material', MaterialController::class);
Route::post('/buscarmaterial',[MaterialController::class,'buscarMaterial'])->name('post.buscar.material');

//clases
Route::resource('clase', ClasesController::class);
Route::post('/buscarclase',[ClasesController::class,'buscarclase'])->name('post.buscar.clase');

//campos
Route::resource('campo',CampoController::class);
Route::post('/buscarcampo',[CampoController::class,'buscarCampo'])->name('post.buscar.campo');


//eventos
Route::resource('evento',EventoController::class);
Route::post('/buscarevento',[EventoController::class,'buscarevento'])->name('post.buscar.evento');
Route::post('/asignarevento/{evento}/{equipo}',[EventoController::class,'asignarevento'])->name('post.asignar.evento');
Route::post('/eliminardelevento/{evento}/{equipo}',[EventoController::class,'eliminardelevento'])->name('post.eliminar.del.evento');
//equipos

Route::resource('equipo', EquipoController::class);
Route::post('/buscarequipo',[EquipoController::class,'buscarequipo'])->name('post.buscar.equipo');
Route::post('/asignarequipo/{equipo}/{usuario}',[EquipoController::class,'asignarequipo'])->name('post.asignar.equipo');
Route::post('/eliminardelequipo/{equipo}/{usuario}',[EquipoController::class,'eliminardelequipo'])->name('post.eliminar.del.equipo');

//tipoeventos

Route::resource('tevento',TipoEventoController::class);
});

