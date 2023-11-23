<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BicicletasController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Rutas para mostrar bicis y eliminarlas
Route::get('/dashboard', [BicicletasController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('dashboard/{bicicleta}',[BicicletasController::class,'destroy'])->name('dashboard.eliminar')->middleware('logborrado');

//Rutas para insertar bicis
Route::get('/insertarBici', [BicicletasController::class,'create'])->middleware(['auth', 'verified'])->name('insertarBici');
Route::post('/insertarBici', [BicicletasController::class,'store'])->name('insertarBici')->middleware('loginsercion');

//Rutas para modificar bicis
//Route::post('/mensajes', [MensajeController::class, 'update'])->name('mensajes.actualizar')->middleware(MaxLengthMiddleware::class);
Route::get('/bicicletas/{bicicleta}/editar', [BicicletasController::class, 'edit'])->middleware(['auth', 'verified'])->name('bicicletas.editar');
Route::post('/bicicleta/{bicicleta}', [BicicletasController::class, 'update'])->name('bicicletas.modificar');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
