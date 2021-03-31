<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Horarios;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/horarios', function () {
    return view('crear');
})->name('horarios');

Route::middleware(['auth:sanctum', 'verified'])->get('/cargos', function () {
    return view('cargos');
})->name('cargos');

Route::middleware(['auth:sanctum', 'verified'])->get('/entidades', function () {
    return view('entidades');
})->name('entidades');

Route::middleware(['auth:sanctum', 'verified'])->get('/lda', function () {
    return view('lda');
})->name('lda');
Route::middleware(['auth:sanctum', 'verified'])->get('/eventos', function () {
    return view('eventos');
})->name('eventos');
Route::middleware(['auth:sanctum', 'verified'])->get('/invitados', function () {
    return view('invitados');
})->name('invitados');


//Route::middleware(['auth:sanctum', 'verified'])->get('/horarios', Horarios::class)->name('horarios');
