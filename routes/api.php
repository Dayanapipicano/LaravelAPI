<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\TypePayController;
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



//RUTAS TEMPORADA CRUD

Route::post('/temporada/store', [SeasonController::class,'store'])->name('season.store');
Route::get('/temporadas', [SeasonController::class, 'index'])->name('seasons.index');
Route::delete('/temporada/destroy/{season}', [SeasonController::class, 'destroy'])->name('season.destroy');
Route::get('/temporada/edit/{season}',[SeasonController::class, 'edit'])->name('season.edit');
Route::put('/temporada/update/{season}',[SeasonController::class, 'update'])->name('season.update');
Route::get('/temporada/show/{season}',[SeasonController::class, 'show'])->name('season.show');


//RUTAS PEDIDO CRUD

Route::post('/pedido/store', [OrderController::class,'store'])->name('order.store');
Route::get('/pedidos', [OrderController::class, 'index'])->name('order.index');
Route::get('/pedido/edit/{order}',[OrderController::class, 'edit'])->name('order.edit');
Route::put('/pedido/update/{order}',[OrderController::class, 'update'])->name('order.update');
Route::get('/pedido/show/{order}',[OrderController::class, 'show'])->name('order.show');




//RUTAS FORMA DE PAGO CRUD

Route::post('/formaDePago/store', [TypePayController::class,'store'])->name('typepay.store');
Route::get('/formaDePagos', [TypePayController::class, 'index'])->name('typepay.index');
Route::delete('/formaDePago/destroy/{typepay}', [TypePayController::class, 'destroy'])->name('typepay.destroy');
Route::get('/formaDePago/edit/{typepay}',[TypePayController::class, 'edit'])->name('typepay.edit');
Route::put('/formaDePago/update/{typepay}',[TypePayController::class, 'update'])->name('typepay.update');
Route::get('/formaDePago/show/{typepay}',[TypePayController::class, 'show'])->name('typepay.show');



//RUTAS DE CARRITO DE COMPRAS CRUD
Route::post('/carritoDeCompra/agregar', [ShoppingCartController::class, 'agregarProducto'])->name('shoppingCart.agregar');
Route::post('/carritoDeCompra/store', [ShoppingCartController::class, 'store'])->name('shoppingCart.store');
Route::get('/carritoDeCompras', [ShoppingCartController::class, 'index'])->name('shoppingCart.index');
Route::get('/carritoDeCompra/edit/{shoppingCart}', [ShoppingCartController::class, 'edit'])->name('shoppingCart.edit');
Route::put('/carritoDeCompra/update/{shoppingCart}', [ShoppingCartController::class, 'update'])->name('shoppingCart.update');
Route::get('/carritoDeCompra/show/{shoppingCart}', [ShoppingCartController::class, 'show'])->name('shoppingCart.show');



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

//RUTAS USUARIO CRUD


Route::post('/usuario/store',[UserController::class,'store'])->name('user.store');
Route::get('/usuario/create',[UserController::class, 'create'])->name('user.create');
Route::get('usuarios', [UserController::class, 'index'])->name('user.index');
Route::delete('/usuario/destroy/{user}', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('/usuario/edit/{id}',[UserController::class, 'edit'])->name('user.edit');
/* Route::put('/usuario/update/{user}',[UserController::class, 'update'])->name('update.crud'); */
Route::get('/usuario/show',[UserController::class, 'show'])->name('user.show');





//RUTAS DE PRODUCTOS CRUD

Route::post('/producto/store', [ProductController::class,'store'])->name('product.store'); 
Route::get('productos',[ProductController::class,'index'])->name('product.index'); 
Route::delete('/producto/destroy/{product}',[ProductController::class,'destroy'])->name('product.destroy');
Route::get('/producto/edit/{id}',[ProductController::class, 'edit'])->name('product.edit');
Route::post('/producto/update/{product}',[ProductController::class, 'update'])->name('product.update');
Route::get('/producto/show/{product}',[ProductController::class, 'show'])->name('product.show');


//TEMPORADAS FILTRO


Route::get('/producto/temporada/{seasonId}', [ProductController::class, 'productTemporada'])->name('temporadas');


//AUTENTICACIONES

Route::post('register', [AuthController::class,'register'])->name('register');
Route::post('logins', [AuthController::class,'logins'])->name('logins');


 Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('/usuario/update',[AuthController::class, 'updateProfile'])->name('user.update');
    Route::get('perfil', [AuthController::class,'getPerfil'])->name('perfil');
    Route::post('/carritoDeCompra/agregarProducto', [ShoppingCartController::class, 'agregarProducto'])->name('carrito.agregarProducto');
    Route::delete('/carritoDeCompra/destroy/{shoppingCart}', [ShoppingCartController::class, 'destroy'])->name('shoppingCart.destroy');
    Route::delete('/pedido/destroy/{order}', [OrderController::class, 'destroy'])->name('order.destroy');
    Route::get('logout', [AuthController::class,'logout'])->name('logout');
   
 
     
}); 



 Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    
}); 





