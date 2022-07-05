<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AsignacionRolController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\EditorialController;
use App\Http\Controllers\EstadosController;
use App\Http\Controllers\LicenciaturaController;
use App\Http\Controllers\MaestroController;
use App\Http\Controllers\PrestamoController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Psy\Command\EditCommand;

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

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('/');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);


	{ //Rutas de Licenciaturas
		Route::controller(LicenciaturaController::class)->middleware('can:icons3')->group(function () {
			Route::get('licenciaturas', 'index')->name('licenciaturas');
			Route::get('agregarLicenciatura', 'create')->name('agregarLicenciatura');
			Route::post('agregarLicenciatura','store')->name('agregarLicenciatura');
			Route::get('licenciaturas/{varlic}/edit','edit')->name('Carrera.edit');
			Route::put('licenciaturas/{varlic}','update')->name('Carrera.update');
			Route::delete('licenciaturas/{varlic}','destroy')->name('Carrera.destroy');
		});
		}
		
		Route::controller(AlumnoController::class)->middleware('can:icons3')->group(function () {
			Route::get('icons', 'index')->name('icons');
			Route::get('agregarUsuario', 'create')->name('agregarUsuario');
			Route::post('agregarUSU','store')->name('agregarUSU');
			Route::get('Alumno/{varAlu}/edit','edit')->name('Alumno.edit');
			Route::put('Alumno/{varAlu}','update')->name('Alumno.update');
			Route::delete('Alumno/{varAlu}','destroy')->name('Alumno.destroy');
			Route::get('obtenerMun/{estado_id}',[EstadosController::class,'byMunicipio']);
			Route::get('obtenerLoc/{municipio_id}',[EstadosController::class,'byLocalidad']);
		});
		Route::controller(MaestroController::class)->middleware('can:icons3')->group(function (){
			Route::get('icons2', 'index')->name('icons2'); 
			Route::get('agregarMaestro','create')->name('agregarMaestro');
			Route::post('agregarMa','store')->name('agregarMa');
			Route::get('Maestro/{varMa}/edit','edit')->name('Maestro.edit');
			Route::put('Maestro/{varMa}','update')->name('Maestro.update');
			Route::delete('Maestro/{varMa}','destroy')->name('Maestro.destroy');
			Route::get('obtenerMun/{estado_id}',[EstadosController::class,'byMunicipio']);
			Route::get('obtenerLoc/{municipio_id}',[EstadosController::class,'byLocalidad']);

		});
		Route::controller(AdministradorController::class)->middleware('can:icons3')->group(function (){
			Route::get('icons3', 'index')->name('icons3');
			Route::get('agregarAdministrador1','create')->name('agregarAdministrador1');
			Route::post('agregarAdministrador','store')->name('agregarAdministrador');
			Route::get('Admin/{varAdmin}/edit','edit')->name('Admin.edit');
			Route::put('Admin/{varAdmin}','update')->name('Admin.update');
			Route::delete('Admin/{varAdmin}','destroy')->name('Admin.destroy');
			Route::get('pdfAdministrador','pdf')->name('PDFAdministrador');
			Route::get('obtenerMun/{estado_id}',[EstadosController::class,'byMunicipio']);
			Route::get('obtenerLoc/{municipio_id}',[EstadosController::class,'byLocalidad']);
		});

		Route::controller(LibroController::class)->group(function(){
			Route::get('map', 'index')->name('map');
			Route::get('agregarLibro', 'create')->name('agregarLibro');
			Route::post('agregarlib','store')->name('agregarlib');
			Route::get('Libro/{varlib}/editarLibro','edit')->name('Libro.editarLibro');
			Route::put('Libro/{varlib}','update')->name('Libro.update');
			Route::delete('Libro/{varlib}','destroy')->name('Libro.destroy');
		
		});
		Route::controller(EditorialController::class)->group(function () {
			Route::get('editoriales', 'index')->name('editoriales');
			Route::get('agregarEditorial', 'create')->name('agregarEditorial');
			Route::post('agregarEditorial','store')->name('agregarEditorial');
			Route::get('editoriales/{varedi}/editedi','edit')->name('Editoriales.editedi');
			Route::put('editoriales/{varedi}','update')->name('Editoriales.update');
			Route::delete('editoriales/{varedi}','destroy')->name('Editoriales.destroy');
		});
		Route::controller(AutorController::class)->group(function () {
			Route::get('autores', 'index')->name('autores');
			Route::get('agregarAutor', 'create')->name('agregarAutor');
			Route::post('agregarAutor','store')->name('agregarAutor');
			Route::get('autores/{varaut}/editaut','edit')->name('Autores.editaut');
			Route::put('autores/{varaut}','update')->name('Autores.update');
			Route::delete('autores/{varedi}','destroy')->name('Autores.destroy');
		});
		Route::controller(CategoriaController::class)->group(function () {
			Route::get('categoria', 'index')->name('categoria');
			Route::get('agregarCategoria', 'create')->name('agregarCategoria');
			Route::post('agregarCategoria','store')->name('agregarCategoria');
			Route::get('Categoria/{varcat}/editcate','edit')->name('Categorias.editcate');
			Route::put('Categorias/{varcat}','update')->name('Categorias.update');
			Route::delete('Categorias/{varcat}','destroy')->name('Categorias.destroy');
		});

		Route::controller(PrestamoController::class)->group(function(){
			Route::get('table-list', 'index')->name('table');
			Route::get('agregarPrestamo/{id}', 'create')->name('agregarPrestamo');
			Route::post('agregarPres','store')->name('agregarPres');
			Route::get('agregarPres/{id}','create2')->name('agregarPres2');//para activar el prestamo
			Route::post('devolucionPres/{id}','devolucion')->name('devolucionPres');//para devolver el libro
			Route::get('Prestamos/{varpres}/editarPrestamo','edit')->name('Prestamos.editarPrestamo');
			Route::put('Prestamos/{varpres}','update')->name('Prestamos.update');
			Route::delete('Prestamos/{varpres}','destroy')->name('Prestamos.destroy');

			Route::get('PDFPrestamoindividual/{id}','pdf')->name('PDFPrestamoindividual');
		});	

		Route::controller(BitacoraController::class)->group(function(){
			Route::get('bitacora', 'index')->name('bitacora');
		});

		Route::controller(AsignacionRolController::class)->group(function(){
			Route::get('rolesUsu','index')->name('rolesUsu');
			Route::put('rolesUsu/{alum}','update')->name('cambioRol');
			//Route::post('rolesUsu/{alum}','update')->name('cambioRol');
			//Route::get('rolesUsu/{alumnos}/edit','edit')->name('cambioRol.edit');
		});
});


