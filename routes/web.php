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

Route::get('/', function () {
    return view('welcome');
    
})->name('home');

Route::get('/end', function () {
    return to_route('home');
    
});

Route::get('/mantenimiento', function() {
        return view('mantenimiento.mantenimiento');
});

//Route::get('/usuarios', 'UserController@index');

Route::get('/contacto', function () {
    //return view('contacto');
    return Str('hello world')->upper();
});

Route::resource('libro', LibroController::class);
