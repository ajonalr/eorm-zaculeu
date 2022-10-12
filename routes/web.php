<?php

use App\Http\Controllers\Admin\EstudianteController;
use App\Http\Controllers\Admin\GradoController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PofesorController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::resource('/users', UserController::class)->middleware('auth');
Route::resource('/roles', 'RoleController')->middleware('auth');
Route::resource('/permissions', 'PermissionController')->except(['show'])->middleware('auth');


Route::group(['prefix' => "admin", 'middleware' => ['auth', 'AdminPanelAccess']], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');



    Route::controller(GradoController::class)->prefix('grados')->group(function () {
        Route::get('index', 'index')->name('grado.index');
        Route::get('perfil/{id}', 'show')->name('grado.show');
        Route::get('editar/{id}', 'edit')->name('grado.editar');
        Route::get('create', 'create')->name('grado.create');
        Route::post('save', 'store')->name('grado.save');
        Route::put('upadte/{id}', 'update')->name('grado.update');
        Route::delete('delete/{id}', 'delete')->name('grado.delete');
    });

    Route::controller(PofesorController::class)->prefix('maestro')->group(function () {
        Route::get('index', 'index')->name('profe.index');
        Route::get('perfil/{id}', 'show')->name('profe.show');
        Route::get('create', 'create')->name('profe.create');
        Route::post('save', 'store')->name('profe.save');
        Route::put('upadte/{id}', 'update')->name('profe.update');
        Route::delete('delete/{id}', 'delete')->name('profe.delete');
        Route::get('asignar-profesor', 'grado_profesor_view')->name('profe.grado_profesor_view');
        Route::post('asignar-profesave', 'grado_profesor')->name('profe.grado_profesor');

        
    });


    Route::controller(EstudianteController::class)->prefix('estudiante')->group(function () {
        Route::get('index', 'index')->name('estu.index');
        Route::get('inscribir', 'inscribir')->name('estu.inscribir');
        Route::post('store', 'store')->name('estudiante.store');
        Route::get('perfil/{id}', 'show')->name('estu.show');
        Route::put('upadte/{id}', 'update')->name('estu.update');
        Route::delete('delete/{id}', 'delete')->name('estu.delete');
    });


    

});
