<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\validaacceso;


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

/*BITACORA MAQUINA*/
Route::resource('bitacora_maquina', App\Http\Controllers\Bitacora_maquinaController::class)->parameters(['bitacora_maquina' => 'bitacora_maquina'])->middleware('validaacceso');
// Route::resource('bitacora_maquina', App\Http\Controllers\Bitacora_maquinaController::class)->parameters(['bitacora_maquina' => 'bitacora_maquina']);
Route::get('pdf/{id}', [App\Http\Controllers\pdfController::class, 'pdf'])->name('pdf');
Route::get('bitacora_detalles/{id_bitacora}', [App\Http\Controllers\Bitacora_detallesController::class, 'index'])->name('bitacora_detalles.index');

/*
|--------------------------------------------------------------------------
| MANTENEDORES DE BITACORA DE MAQUINA
|--------------------------------------------------------------------------
*/

/* Bitacora*/
Route::get('bdm_mantenedores/bitacora/{id_bitacora}', [App\Http\Controllers\Bitacora_detallesController::class, 'bitacora'])->name('bdm_mantenedores.bitacora');
Route::get('bdm_mantenedores/bitacora_c/', [App\Http\Controllers\Bitacora_detallesController::class, 'bitacora_c'])->name('bdm_mantenedores.bitacora_c');
Route::post('bdm_mantenedores/bitacora_modificar', [App\Http\Controllers\Bitacora_detallesController::class, 'bitacora_modificar'])->name('bdm_mantenedores.bitacora_modificar');
Route::post('bdm_mantenedores/bitacora_crear', [App\Http\Controllers\Bitacora_detallesController::class, 'bitacora_crear'])->name('bdm_mantenedores.bitacora_crear');
//Route::post('bdm_mantenedores/bitacora_destroy/{id_bitacora}', [App\Http\Controllers\Bitacora_detallesController::class, 'bitacora_destroy'])->name('bdm_mantenedores.bitacora_destroy');

//Route::delete('bdm_mantenedores/bitacora_destroy/{id_bitacora}', [App\Http\Controllers\Bitacora_detallesController::class, 'bitacora_destroy'])->name('bdm_mantenedores.bitacora_destroy');



/*Tabla de paso*/
Route::get('bdm_mantenedores/tabla_de_cambios/{id_bitacora}', [App\Http\Controllers\Bitacora_detallesController::class, 'tabla_de_cambios'])->name('bdm_mantenedores.tabla_de_cambios');
Route::post('bdm_mantenedores/tabla_de_cambios_guardar', [App\Http\Controllers\Bitacora_detallesController::class, 'tabla_de_cambios_guardar'])->name('bdm_mantenedores.tabla_de_cambios_guardar');


/*Control de Horas De Servicios - Control de insumos*/
Route::get('bdm_mantenedores/control_de_insumos/{id_bitacora}', [App\Http\Controllers\Bitacora_detallesController::class, 'controldeinsumos_c'])->name('bdm_mantenedores.control_de_insumos');
Route::post('bdm_mantenedores/controldeinsumo_guardar', [App\Http\Controllers\Bitacora_detallesController::class, 'controldeinsumo_guardar'])->name('bdm_mantenedores.controldeinsumo_guardar');
Route::post('calcula_motorprincipalcm', [App\Http\Controllers\Bitacora_detallesController::class, 'calcula_motorprincipalcm'])->name('calcula_motorprincipalcm');

/*Control de Horas De Servicios - Motor principal y CM*/
Route::get('bdm_mantenedores/motorprincipalycm/{id_bitacora}', [App\Http\Controllers\Bitacora_detallesController::class, 'motorprincipalycm'])->name('bdm_mantenedores.motorprincipalycm');
Route::post('bdm_mantenedores/motor_principal_y_cm_guardar', [App\Http\Controllers\Bitacora_detallesController::class, 'motor_principal_y_cm_guardar'])->name('bdm_mantenedores.motor_principal_y_cm_guardar');
/*Control de Horas De Servicios - Motor Aux*/
Route::get('bdm_mantenedores/motoresaux/{id_bitacora}/{i}', [App\Http\Controllers\Bitacora_detallesController::class, 'motoresaux'])->name('bdm_mantenedores.motoresaux');
Route::post('bdm_mantenedores/motores_aux_guardar', [App\Http\Controllers\Bitacora_detallesController::class, 'motores_aux_guardar'])->name('bdm_mantenedores.motores_aux_guardar');
Route::post('calcula_motoraux', [App\Http\Controllers\Bitacora_detallesController::class, 'calcula_motoraux'])->name('calcula_motoraux');


/*Tabla de cambio Motor auxilizar*/
Route::get('bdm_mantenedores/tablacambio_motoresaux/{id_bitacora}/{i}', [App\Http\Controllers\Bitacora_detallesController::class, 'tablacambio_motoresaux'])->name('bdm_mantenedores.tablacambio_motoresaux');

Route::post('bdm_mantenedores/tablacambio_motores_aux_guardar', [App\Http\Controllers\Bitacora_detallesController::class, 'tablacambio_motores_aux_guardar'])->name('bdm_mantenedores.tablacambio_motores_aux_guardar');



/*Control de Operacion - Motor Principal */
Route::get('bdm_mantenedores/motorprincipal/{id_bitacora}', [App\Http\Controllers\Bitacora_detallesController::class, 'motorprincipal'])->name('bdm_mantenedores.motorprincipal');
Route::post('bdm_mantenedores/motorprincipal_guardar', [App\Http\Controllers\Bitacora_detallesController::class, 'motorprincipal_guardar'])->name('bdm_mantenedores.motorprincipal_guardar');



/*Control de Operacion - Contra Marcha */
Route::get('bdm_mantenedores/cotramarcha/{id_bitacora}', [App\Http\Controllers\Bitacora_detallesController::class, 'cotramarcha'])->name('bdm_mantenedores.cotramarcha');
Route::post('bdm_mantenedores/contra_marcha_guardar', [App\Http\Controllers\Bitacora_detallesController::class, 'contra_marcha_guardar'])->name('bdm_mantenedores.contra_marcha_guardar');


/*Control de Operacion - Hytek */
Route::get('bdm_mantenedores/hytek/{id_bitacora}', [App\Http\Controllers\Bitacora_detallesController::class, 'hytek'])->name('bdm_mantenedores.hytek');
Route::post('bdm_mantenedores/hytek_guardar', [App\Http\Controllers\Bitacora_detallesController::class, 'hytek_guardar'])->name('bdm_mantenedores.hytek_guardar');




/*Control de Operacion - M Aux Babor */
Route::get('bdm_mantenedores/mauxbabor/{id_bitacora}', [App\Http\Controllers\Bitacora_detallesController::class, 'mauxbabor'])->name('bdm_mantenedores.mauxbabor');
Route::post('bdm_mantenedores/m_aux_babor_guardar', [App\Http\Controllers\Bitacora_detallesController::class, 'm_aux_babor_guardar'])->name('bdm_mantenedores.m_aux_babor_guardar');
/*Control de Operacion - M Aux Babor */
Route::get('bdm_mantenedores/motor_auxiliar_estribor/{id_bitacora}', [App\Http\Controllers\Bitacora_detallesController::class, 'motor_auxiliar_estribor'])->name('bdm_mantenedores.motor_auxiliar_estribor');
Route::post('bdm_mantenedores/motor_auxiliar_estribor_guardar', [App\Http\Controllers\Bitacora_detallesController::class, 'motor_auxiliar_estribor_guardar'])->name('bdm_mantenedores.motor_auxiliar_estribor_guardar');
/*Control de Operacion - Estado de equipo y alarma */
Route::get('bdm_mantenedores/estadosdeequipoyalarma/{id_bitacora}', [App\Http\Controllers\Bitacora_detallesController::class, 'estadosdeequipoyalarma'])->name('bdm_mantenedores.estadosdeequipoyalarma');
Route::post('bdm_mantenedores/bitacorademaquina_guardar/estados_de_equipo_y_alarma_guardar', [App\Http\Controllers\Bitacora_detallesController::class, 'estados_de_equipo_y_alarma_guardar'])->name('bdm_mantenedores.estados_de_equipo_y_alarma_guardar');




/*FIN DE BITACORA*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





// Ruta solo para ADMIN Y SUPER ADMIN
Route::resource('usuarios', App\Http\Controllers\UsuariosController::class)->parameters(['usuarios' => 'user'])->middleware('validaacceso_solo_superadmin');

Auth::routes();



Route::resource('armador', App\Http\Controllers\ArmadoresController::class)->parameters(['armador' => 'armador'])->middleware('validaacceso_solo_superadmin');
Route::resource('embarcacion', App\Http\Controllers\EmbarcacionesController::class)->parameters(['embarcacion' => 'embarcacion'])->middleware('validaacceso');
Route::resource('motorista', App\Http\Controllers\MotoristaController::class)->parameters(['motorista' => 'motorista'])->middleware('validaacceso');




/*finalizar bitacora*/
Route::get('finalizabitacora/{id_bitacora}', [App\Http\Controllers\Bitacora_detallesController::class, 'finalizabitacora'])->name('finalizabitacora');



/*
Route::get('/password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->middleware('prevent_password_reset')->name('password.request');
Route::post('/password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->middleware('prevent_password_reset')->name('password.email');

*/





