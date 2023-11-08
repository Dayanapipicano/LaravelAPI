<?php

use App\Http\Controllers\RolController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



//RUTAS Temporada

Route::post('/temporada/store', [SeasonController::class,'store'])->name('season.store');
Route::get('temporada/create',[SeasonController::class,'create'])->name('season.create');
Route::get('/temporadas', [SeasonController::class, 'index'])->name('seasons.index');
Route::delete('/temporada/destroy/{season}', [SeasonController::class, 'destroy'])->name('season.destroy');
Route::get('/temporada/edit/{season}',[SeasonController::class, 'edit'])->name('season.edit');
Route::put('/temporada/update/{season}',[SeasonController::class, 'update'])->name('season.update');
Route::get('/temporada/show/{season}',[SeasonController::class, 'show'])->name('season.show');


//RUTAS ROL

Route::post('/rol/store', [RolController::class,'store'])->name('rol.store');
Route::get('/rol/create',[RolController::class,'create'])->name('rol.create');
Route::get('/roles',[RolController::class,'index'])->name('rol.index');
Route::delete('/rol/destroy/{rol}', [RolController::class, 'destroy'])->name('rol.destroy');
Route::get('/rol/edit/{rol}',[RolController::class, 'edit'])->name('rol.edit');
Route::put('/rol/update/{rol}',[RolController::class, 'update'])->name('rol.update');
Route::get('/rol/show',[RolController::class, 'show'])->name('rol.show');


//RUTAS USUARIO


Route::post('/usuario/store',[UserController::class,'store'])->name('user.store');
Route::get('/usuario/create',[UserController::class, 'create'])->name('user.create');
Route::get('usuarios',[UserController::class, 'index'])->name('user.index');
Route::delete('/usuario/destroy/{user}', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('/usuario/edit/{id}',[UserController::class, 'edit'])->name('user.edit');
Route::put('/usuario/update/{user}',[UserController::class, 'update'])->name('user.update');
Route::get('/usuario/show',[UserController::class, 'show'])->name('user.show');

Route::put('/usuario/update/perfil/{user}',[UserController::class, 'updatePerfil'])->name('user.updatePerfil');



Route::get('perfil', [UserController::class, 'shows'])->name('perfil');