<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

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

Route::controller(AuthController::class)->group(function(){
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'auth')->name('login.post');
    Route::get('/registration', 'signUp')->name('signup');
    Route::post('/registration', 'registration')->name('registration.post');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/editUser', 'editUser')->name('editUser');
});

Route::delete('delete/{user}', [UserController::class, 'delete'])->middleware('auth')->name('user.delete');


Route::controller(ProjectController::class)->middleware('auth')->group(function () {
    Route::get('/', 'index')->name('project.main');
    Route::post('/', 'store')->name('project.add');
    Route::get('/{project}/show', 'show')->name('project.show');
    Route::get('/edit/{id}', 'edit')->name('project.edit');
    Route::patch('/{project}', 'update')->name('project.update');
    Route::delete('/{project}', 'destroy')->name('project.delete');
});

Route::get('/active', [TaskController::class, 'active'])->middleware('auth')->name('active');
Route::get('/completed', [TaskController::class, 'completed'])->middleware('auth')->name('completed');





Route::controller(TaskController::class)->middleware('auth')->prefix('/show')->group(function () {
    Route::post('/', 'store')->name('task.add');
    Route::get('/{task}/edit', 'edit')->name('task.edit');
    Route::patch('/{task}', 'update')->name('task.update');
    Route::delete('/{task}', 'destroy')->name('task.delete');
    Route::patch('/finished/{task}', 'finished')->name('task.finished');
});


// Route::get('/', 'HomeController@index')->name('main');

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
