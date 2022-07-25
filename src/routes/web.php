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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', ['App\Http\Controllers\PropertiesController', 'index']);
// Route::get('/', ['App\Http\Controllers\PropertiesController', 'search'])->name('search');

Route::get('/show/{id}', ['App\Http\Controllers\PropertiesController', 'show'])->name('show');

Route::prefix('properties')->group(function () {
    Route::get('regist', ['App\Http\Controllers\PropertiesController', 'regist'])->name('regist');
    Route::post('store', ['App\Http\Controllers\PropertiesController', 'store'])->name('store');
    Route::get('edit/{id}', ['App\Http\Controllers\PropertiesController', 'edit'])->name('edit');
    Route::post('editConfirm/{id}', ['App\Http\Controllers\PropertiesController', 'editConfirm'])->name('editConfirm');
    Route::post('editComplete/{id}', ['App\Http\Controllers\PropertiesController', 'editComplete'])->name('editComplete');
    Route::get('delete/{id}', ['App\Http\Controllers\PropertiesController', 'delete'])->name('delete');
});
