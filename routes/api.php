<?php

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
  
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});


//rutas brasly
Route::resource('pacientes','PacienteController');
Route::resource('pacientes_antecedentes_familiares','PacientesAntecedentesFamiliaresController');
Route::resource('pacientes_antecedentes_personales','PacientesAntecedentesPersonalesController');
Route::resource('pacientes_habitos_toxicologicos','PacientesHabitosToxicologicosController');
Route::resource('enfermedades','EnfermedadesController');
Route::resource('habitos_toxicologicos','HabitosToxicologicosController');

Route::resource('tipos_enfermedades','TipoEnfermedadController');
Route::resource('parentescos','ParentescosController');
Route::resource('estados_civiles','EstadosCivilesController');
Route::resource('seguros_medicos','SegurosMedicosController');
Route::resource('practicas_sexuales','PracticasSexualesController');
Route::resource('metodos_planificaciones','MetodosPlanificacionesController');

Route::get('ultimoIdAntecedente','AntecedentesController@obtenerUltimoIdAntecedente');




// Route::resource('antecedentes_personales','AntecedentesPersonalesController');
// Route::resource('habitos_toxicologicos_personales','HabitosToxicologicosPersonalesController');
Route::resource('actividad_sexual','ActividadSexualController');
Route::resource('antecedentes_ginecologicos','AntecedentesGinecologicosController');
Route::resource('planificaciones_familiares','PlanificacionesFamiliaresController');
Route::resource('antecedentes_obstetricos','AntecedentesObstetricosController');
Route::resource('login','LoginController');








//rutas melvin
Route::resource('login_admin','LoginAdminController');
Route::resource('medicos','MedicosController');


//rutas alberto
Route::resource('inventarios','InventarioController');
Route::get('medicamentos','InventarioController@obtenerMedicamentos');




















//rutas marvin
Route::get('pacientes/ultimo/si','PacienteController@ultimoID');
Route::resource('citas','CitasController');


























// rutas alberto
