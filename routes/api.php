<?php

use App\Http\Controllers\SeasonController;
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


Route::post('temporadas2', [SeasonController::class,'store'])->name('temporadasStore');
Route::get('temporada/create',[SeasonController::class,'create'])->name('temporada.create');
Route::get('temporada',[SeasonController::class,'index'])->name('seasons.index');
Route::delete('temporada/{season}', [SeasonController::class, 'destroy'])->name('season.destroy');
Route::get('temporadas/{season}',[SeasonController::class, 'edit'])->name('season.edit');
Route::put('temporadas/{season}',[SeasonController::class, 'update'])->name('season.update');
Route::get('temporadas1/{season}',[SeasonController::class, 'show'])->name('season.show');
