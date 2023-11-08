<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\NotificationOrderController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\PQRController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReturnsController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\TypePayController;
use App\Http\Controllers\UserController;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Route;
use JetBrains\PhpStorm\Immutable;

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
