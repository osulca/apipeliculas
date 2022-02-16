<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\UsuarioController;
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
    return view('subir');
});
Route::post("/subir", [PeliculaController::class, "upload"]);
Route::get("/login", [UsuarioController::class, "mostrarFormulario"]);
Route::post("/login", [UsuarioController::class, "login"]);

Route::apiResource("/peliculas", PeliculaController::class);
