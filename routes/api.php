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

// estas rutas se pueden acceder sin proveer de un token válido.

Route::post('loguear', 'LoginController@login');// cuando el usuario ya esta registrado.
Route::post('registrar', 'LoginController@register');// cuando el usuario entra por primera vez.


// estas rutas requiren de un token válido para poder accederse.
Route::group(['middleware' => 'jwt.auth'], function () {

    Route::post('logout', 'LoginController@logout'); 
    Route::post('getCurrentUser', 'LoginController@getAuthUser');


});

// Route::group(['middleware' => ['jwt.verify']], function() {
//     /*AÑADE AQUI LAS RUTAS QUE QUIERAS PROTEGER CON JWT*/
//     // Route::post('/logout', 'AuthController@logout');
//     Route::post('getCurrentUser', 'LoginController@getAuthUser');

// });


//rutas brasly
Route::resource('datos_login','LoginController');
Route::resource('pacientes','PacienteController');
Route::resource('pacientes_antecedentes_familiares','PacientesAntecedentesFamiliaresController');
Route::resource('pacientes_antecedentes_personales','PacientesAntecedentesPersonalesController');
Route::resource('pacientes_habitos_toxicologicos','PacientesHabitosToxicologicosController');
Route::resource('p_hospitalarias_quirurgicas','PacientesHospitalariasQuirurgicasController');
Route::resource('enfermedades','EnfermedadesController');
Route::resource('telefonos_emergencia','TelefonosEmergenciaController');



Route::get('columna_enfermedades/{id_grupo_enfermedad}','EnfermedadesController@obtenerColumnaEnfermedad');
Route::get('columna_habito_toxicologico','HabitosToxicologicosController@obtenerColumnaHabitoToxicologico');
Route::get('obtenerColumnaNumeroTelefono/{numero_telefono}','PacienteController@obtenerColumnaNumeroTelefono');
Route::resource('habitos_toxicologicos','HabitosToxicologicosController');
// Route::get('obtenerUsuario/{cuenta}/{clave}','LoginController@obtenerUsuario');
Route::post('obtenerUsuario','LoginController@obtenerUsuario');
Route::get('obtenerAdministrador/{id}','AdministradorController@obtenerAdministrador');
Route::get('obtenerPaciente/{cuenta}','PacienteController@obtenerPaciente');
Route::get('obtenerMedico/{id}','MedicosController@obtenerMedico');
Route::post('verificarClave','LoginController@verificarClave');
Route::post('duplicarRegistro','LoginController@duplicarRegistro');
Route::get('obtenerIdLoginMedico/{medico}','LoginController@obtenerIdLoginMedico');




//obtener datos de los grupos de enfermedades Antecedentes Familiares
Route::get('obtenerdesnutricionAF/{id}','PacientesAntecedentesFamiliaresController@obtenerdesnutricionAF');




Route::resource('parentescos','ParentescosController');
Route::resource('estados_civiles','EstadosCivilesController');
Route::resource('seguros_medicos','SegurosMedicosController');
Route::resource('practicas_sexuales','PracticasSexualesController');
Route::resource('metodos_planificaciones','MetodosPlanificacionesController');


Route::get('ultimoIdAntecedente','AntecedentesController@obtenerUltimoIdAntecedente');
Route::get('ultimoIdLogin','LoginController@ultimoIdLogin');





Route::resource('actividad_sexual','ActividadSexualController');
Route::resource('antecedentes_ginecologicos','AntecedentesGinecologicosController');
Route::resource('planificaciones_familiares','PlanificacionesFamiliaresController');
Route::resource('antecedentes_obstetricos','AntecedentesObstetricosController');









//rutas melvin
Route::get('obtenerColumnaUsuarioAdmin/{usuario}','AdministradorController@obtenerColumnaUsuarioAdmin');
Route::resource('administradores','AdministradorController');
Route::resource('medicos','MedicosController');


//rutas alberto
Route::resource('inventarios','InventarioController');
Route::get('medicamentos','InventarioController@obtenerMedicamentos');
Route::post('medicamentos/egreso','InventarioController@disminucion');
Route::get('obtenerColumnaUsuarioMedicos/{usuario}','MedicosController@obtenerColumnaUsuarioMedicos');
Route::get('obtenerColumnaIdentidad/{numero_identidad}','PacienteController@obtenerColumnaIdentidad');




















//rutas marvin
Route::get('pacientes/ultimo/si','PacienteController@ultimoID');
Route::resource('citas','CitasController');


























// rutas alberto
