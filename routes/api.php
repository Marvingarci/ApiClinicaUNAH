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


//rutas brasly
Route::resource('pacientes','PacienteController');
Route::resource('antecedentes_familiares','AntecedentesFamiliaresController');
Route::resource('antecedentes_personales','AntecedentesPersonalesController');
Route::resource('habitos_toxicologicos_personales','HabitosToxicologicosPersonalesController');
Route::resource('actividad_sexual','ActividadSexualController');
Route::resource('antecedentes_ginecologicos','AntecedentesGinecologicosController');
Route::resource('planificaciones_familiares','PlanificacionesFamiliaresController');
Route::resource('antecedentes_obstetricos','AntecedentesObstetricosController');
Route::resource('login','LoginController');



//rutas melvin
Route::resource('login_admin','LoginAdminController');





















//rutas marvin


























// rutas alberto
