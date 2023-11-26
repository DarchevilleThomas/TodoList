<?php

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

Route::get('/', [\App\Http\Controllers\TodoController::class,'index']);
Route::get('/ajouter', [\App\Http\Controllers\TodoController::class,'ajouter']);
Route::get('/delete/{id?}', [\App\Http\Controllers\TodoController::class,'delete']);
Route::post('/ajouter/traitement', [\App\Http\Controllers\TodoController::class,'ajouterTraitement']);

Route::get('/edit/{id}',[\App\Http\Controllers\TodoController::class,'edit']);
Route::post('/edit/traitement',[\App\Http\Controllers\TodoController::class,'editTraitement']);

Route::get('/activate/{id}',[\App\Http\Controllers\TodoController::class,'activate']);
