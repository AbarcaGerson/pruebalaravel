<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CursoController;

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

//Para laravel 7 Route::get('cursos', 'HomeController');
Route::get('/', HomeController::class);

//Grupo de rutas desde laravel 9
Route::controller(CursoController::class)->group(function(){
    //Para asignar nombre a una routa se realiza con
    // ->name('nombre_a_asignar')
    Route::get('cursos', 'index')->name('cursos.index');
    Route::get('cursos/create', 'create')->name('cursos.create');

    //Ruta de tipo POST
    Route::post('cursos', 'store')->name('cursos.store');

    Route::get('cursos/{curso}', 'show')->name('cursos.show');

    //Ruta para editar curso
    Route::get('cursos/{curso}/edit', 'edit')->name('cursos.edit');

    //Ruta para enviar la informacion actualizada, laravel recomienda utilizar PUT en lugar de POST
    Route::put('cursos/{curso}', 'update')->name('cursos.update');
});


//Para laravel 7 Route::get('cursos', 'CursoController@index');

//Para laravel 8 a más
/*Route::get('cursos', [CursoController::class, 'index']);
Route::get('cursos/create', [CursoController::class, 'create']);
Route::get('cursos/{curso}', [CursoController::class, 'show']);*/
