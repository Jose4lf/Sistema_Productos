<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
   return view('welcome');
 });

route::controller(ProductoController::class)->group(function () {
    Route::get('producto', 'index')->name('producto.index');
    Route::get('producto/crear', 'crear')->name('producto.crear');
    Route::get('producto/{x}', 'show')->name('producto.show');
    Route::post('producto', 'store')->name('producto.store');
    //Route::get('producto/{producto}/edit', 'edit')->name('producto.edit');
    Route::get('producto/{producto}/edit', 'editar')->name('producto.editar');

    //6. RUTA PARA MANDAR EL FORMULARIO MODIFICADO
    Route::put('producto/{producto}', 'update')->name('producto.update');
    Route::delete('eliminar/{x}', 'destroy')->name('producto.destroy');

});




























// route::controller(ProductoController::class)->group (function(){
//     Route::get('producto','index');

//     Route::get('producto/crear', 'crear');
//     Route::get('producto/{x}', 'show');
// });
// //forma normal
// Route::get('producto/crear', [ProductoController::class, "index"])->name('producto.crear');

// Route::get('producto', [ProductoController:: class, 'index']);

//  Route::get('producto/crear', [ProductoController:: class, 'crear']);
//  Route::get('producto/{x}',[ProductoController:: class , 'show']);
//  Route::get('producto/{variable1}/{variable2}', function ($variable1 , $variable2 ) {
//     // return view('welcome');
//     return "el producto es: $variable1 y tambien $variable2" ;
//  });

// Route::get('producto/{variable1}/{variable2}', function ($variable1 , $variable2 = null) {
//     if ($variable2) {
//         return "el producto nro 1 es : $variable1 y tambien $variable2" ;
//     }else{
//         return "el producto nro1 es : $variable1" ;
//     }

//  });
Route::get('variable/subdirectorio', homeController::class, 'index');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
});
