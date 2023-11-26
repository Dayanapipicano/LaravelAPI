<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Http\Controllers\AuthenticatedSessionController;


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



//RUTAS TEMPORADA

Route::post('/temporada/store', [SeasonController::class,'store'])->name('season.store');
Route::get('temporada/create',[SeasonController::class,'create'])->name('season.create');
Route::get('/temporadas', [SeasonController::class, 'index'])->name('seasons.index');
Route::delete('/temporada/destroy/{season}', [SeasonController::class, 'destroy'])->name('season.destroy');
Route::get('/temporada/edit/{season}',[SeasonController::class, 'edit'])->name('season.edit');
Route::put('/temporada/update/{season}',[SeasonController::class, 'update'])->name('season.update');
Route::get('/temporada/show/{season}',[SeasonController::class, 'show'])->name('season.show');


//RUTAS ROL
/* 
Route::post('/rol/store', [RolController::class,'store'])->name('rol.store');
Route::get('/rol/create',[RolController::class,'create'])->name('rol.create'); */
Route::get('/roles',[RoleController::class,'index'])->name('rol.index');
/* Route::delete('/rol/destroy/{rol}', [RolController::class, 'destroy'])->name('rol.destroy');
Route::get('/rol/edit/{rol}',[RolController::class, 'edit'])->name('rol.edit');
Route::put('/rol/update/{rol}',[RolController::class, 'update'])->name('rol.update');
Route::get('/rol/show',[RolController::class, 'show'])->name('rol.show');
 */

//RUTAS USUARIO


Route::post('/usuario/store',[UserController::class,'store'])->name('user.store');
Route::get('/usuario/create',[UserController::class, 'create'])->name('user.create');
Route::get('usuarios', [UserController::class, 'index'])->name('user.index');
Route::delete('/usuario/destroy/{user}', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('/usuario/edit/{id}',[UserController::class, 'edit'])->name('user.edit');
/* Route::put('/usuario/update/{user}',[UserController::class, 'update'])->name('update.crud'); */
Route::get('/usuario/show',[UserController::class, 'show'])->name('user.show');

Route::post('register', [AuthController::class,'register'])->name('register');
Route::post('logins', [AuthController::class,'logins'])->name('logins');





//RUTAS DE PRODUCTOS
Route::post('/producto/store', [ProductController::class,'store'])->name('product.store');
Route::get('/producto/create',[ProductController::class,'create'])->name('product.create');
Route::get('productos',[ProductController::class,'index'])->name('product.index'); 
Route::delete('/producto/destroy/{product}',[ProductController::class,'destroy'])->name('product.destroy');
Route::get('/producto/edit/{id}',[ProductController::class, 'edit'])->name('product.edit');
Route::put('/producto/update/{product}',[ProductController::class, 'update'])->name('product.update');
Route::get('/producto/show/{product}',[ProductController::class, 'show'])->name('product.show');









//AUTHENTICACIONES

 Route::middleware(['auth:sanctum'])->group(function(){
    Route::put('/usuario/update',[AuthController::class, 'updateProfile'])->name('user.update');
    Route::get('perfil', [AuthController::class,'getPerfil'])->name('perfil');
    Route::get('logout', [AuthController::class,'logout'])->name('logout');
 
     
}); 



 Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    
}); 



//TEMPORADAS


Route::get('/producto/primavera', [ProductController::class,'primavera'])->name('primavera');
Route::get('/producto/verano', [ProductController::class,'verano'])->name('verano');
Route::get('/producto/otoño', [ProductController::class,'otoño'])->name('otoño');
Route::get('/producto/invierno', [ProductController::class,'invierno'])->name('invierno');
