<?php

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

/*Route::get('/', function () {
    return view('welcome');
}); */

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/bliling', function () {
    return view('forma_de_pago.formadepago');
})->name('formasdepago');

Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/productos/create', [App\Http\Controllers\productosController::class, 'create'])->name('productos.create');
Route::post('/productos/store', [App\Http\Controllers\productosController::class, 'store'])->name('productos.store');
Route::get('/productos/{id}', [App\Http\Controllers\productosController::class, 'show'])->name('productos.show');
Route::get('/productos', [App\Http\Controllers\productosController::class, 'index'])->name('productos.index');

Route::post('/cart/store', [App\Http\Controllers\productosController::class, 'storeCarrito'])->name('carrito.store');
Route::get('/cart', [App\Http\Controllers\productosController::class, 'indexCarrito'])->name('carrito.index');
Route::post('/cart/success', [App\Http\Controllers\ventasController::class, 'cartSuccess'])->name('cart.store');

Route::get('/pay', [App\Http\Controllers\pagoController::class, 'index'])->name('pago.index');
Route::post('/success/{nom}', [App\Http\Controllers\ventasController::class, 'store'])->name('ventas.store');
