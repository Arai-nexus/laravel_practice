<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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

Route::group(['middleware' => 'auth'], function() {
    
    // ホーム画面へアクセス
    Route::get('/', [HomeController::class, 'index'])->name('home');
    
    // タスクのルーティング
    Route::get('/folders/{folder}/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/folders/{folder}/tasks/create', [TaskController::class, 'showCreateForm'])->name('tasks.create');
    Route::post('/folders/{folder}/tasks/create', [TaskController::class, 'create']);
    Route::get('/folders/{folder}/tasks/{task_id}/edit', [TaskController::class, 'showEditForm'])->name('tasks.edit');
    Route::post('/folders/{folder}/tasks/{task_id}/edit', [TaskController::class, 'edit']);
    
    // フォルダーのルーティング
    Route::get('/folders/create', [FolderController::class, 'showCreateForm'])->name('folders.create');
    Route::post('/folders/create', [FolderController::class, 'create']);
});

Auth::routes();

/**
 * 生徒表示のルーティング
 */
// Route::get('/', ['App\Http\Controllers\StudentController', 'index'])->name('index');
// Route::prefix('student')->group(function () {
//     Route::get('create', ['App\Http\Controllers\StudentController', 'create'])->name('create');
//     Route::post('store', ['App\Http\Controllers\StudentController', 'store'])->name('store');
//     Route::get('edit/{id}', ['App\Http\Controllers\StudentController', 'edit'])->name('edit');
//     Route::post('edit/{id}', ['App\Http\Controllers\StudentController', 'update'])->name('update');
//     Route::get('delete/{id}', ['App\Http\Controllers\StudentController', 'delete'])->name('delete');
// });

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
