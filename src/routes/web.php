<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\ContactsController;

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

// Route::get('/', ['App\Http\Controllers\PropertiesController', 'index']);

Route::get('/show/{id}', ['App\Http\Controllers\PropertiesController', 'show'])->name('show');

Route::post('/store', ['App\Http\Controllers\ContactsController', 'store'])->name('store');
