<?php

use App\Http\Controllers\Admin\EstudianteController;
use App\Http\Controllers\Admin\GradoController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MateriaGradoController;
use App\Http\Controllers\Admin\NotaFinalMateriaController;
use App\Http\Controllers\Admin\PofesorController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('/users', UserController::class)->middleware('auth');
Route::resource('/roles', 'RoleController')->middleware('auth');
Route::resource('/permissions', 'PermissionController')->except(['show'])->middleware('auth');


// Login
Route::get('/login-profe', [PofesorController::class, 'login'])->name('profe.login');
Route::post('/login-profe', [PofesorController::class, 'authenticate'])->name('profe.authenticate');
// logout
Route::post('/logout-profe', [PofesorController::class, 'logout'])->name('profe.logout');

Route::group(['prefix' => "profesor", 'middleware' => []], function () {
    Route::get('/profe-califica', [PofesorController::class, 'calificar'])->name('profe.calificar');
    Route::get('/profe-inicio', [PofesorController::class, 'homeProfe'])->name('profe.home');
    Route::get('/grado-show/{grado_id}/{profe_id}', [PofesorController::class, 'getGradoProfe'])->name('profe.getGradoProfe');
    Route::post('nueva-nota', [NotaFinalMateriaController::class, 'sttoreAndAssignEstudiente'])->name('nota.sttoreAndAssignEstudiente');

    Route::get('tareas/{grado_id}/{materia_id}', [NotaFinalMateriaController::class, 'findNotaFintalToGradoAndMateria'])->name('nota.findNotaFintalToGradoAndMateria');

    Route::put('califica/{id}', [NotaFinalMateriaController::class, 'calificar'])->name('profe.calificarnOTA');
});



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

    Route::controller(MateriaGradoController::class)->prefix('materia-grado')->group(function () {
        Route::get('index', 'index')->name('materiaG.index');
        Route::get('create', 'create')->name('materiaG.create');
        Route::post('store', 'store')->name('materiaG.store');
        Route::get('perfil/{id}', 'show')->name('materiaG.show');
        Route::put('upadte/{id}', 'update')->name('materiaG.update');
        Route::delete('delete/{id}', 'delete')->name('materiaG.delete');
    });

    Route::controller(NotaFinalMateriaController::class)->prefix('nota-final')->group(function () {
        Route::post('store', 'store')->name('notaFinal.store');
    });
});
