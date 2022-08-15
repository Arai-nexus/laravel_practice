<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\StudentController;

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

Route::get('/', ['App\Http\Controllers\StudentController', 'index'])->name('index');
Route::prefix('student')->group(function () {
    Route::get('create', ['App\Http\Controllers\StudentController', 'create'])->name('create');
    Route::post('store', ['App\Http\Controllers\StudentController', 'store'])->name('store');
    Route::get('edit/{id}', ['App\Http\Controllers\StudentController', 'edit'])->name('edit');
    Route::post('update/{id}', ['App\Http\Controllers\StudentController', 'update'])->name('update');
    Route::get('delete/{id}', ['App\Http\Controllers\StudentController', 'delete'])->name('delete');
});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', ['App\Http\Controllers\PropertiesController', 'index']);

// Route::get('/showAll', ['App\Http\Controllers\PropertiesController', 'showAll']); //ajaxで全表示
// Route::post('/show-detail', ['App\Http\Controllers\PropertiesController', 'showDetail']); //1件表示
// Route::get('/show/{id}', ['App\Http\Controllers\PropertiesController', 'show'])->name('show');

// Route::prefix('properties')->group(function () {
//     Route::get('regist', ['App\Http\Controllers\PropertiesController', 'regist'])->name('regist');
//     Route::post('store', ['App\Http\Controllers\PropertiesController', 'store'])->name('store');
//     Route::get('edit/{id}', ['App\Http\Controllers\PropertiesController', 'edit'])->name('edit');
//     Route::post('editConfirm/{id}', ['App\Http\Controllers\PropertiesController', 'editConfirm'])->name('editConfirm');
//     Route::post('editComplete/{id}', ['App\Http\Controllers\PropertiesController', 'editComplete'])->name('editComplete');
//     Route::get('delete/{id}', ['App\Http\Controllers\PropertiesController', 'delete'])->name('delete');
// });

// Route::get('/', ['App\Http\Controllers\PropertiesController', 'search'])->name('search');
