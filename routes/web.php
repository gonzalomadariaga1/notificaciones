<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ReportesController;

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

Route::get('/', [HomeController::class , 'index'])->name('home')->middleware('auth');
Route::get('/home', [HomeController::class , 'index'])->name('home')->middleware('auth');
Auth::routes();

Route::name('admin.')->group(function(){
    Route::group([ 'middleware' => 'auth'], function(){
        Route::get('/users/{id}/edit_permiso', [UsersController::class , 'edit_permiso'])->name('users.edit_permiso');    
        Route::patch('/users/{id}/update_permiso', [UsersController::class , 'update_permiso'])->name('users.update_permiso');    
        Route::patch('/users/{id}/update_pass', [UsersController::class , 'update_pass'])->name('users.update_pass');    
        Route::patch('/users/{id}/update_name_email', [UsersController::class , 'update_name_email'])->name('users.update_name_email');    
        Route::get('/users/{id}/unable_user', [UsersController::class , 'unable_user'])->name('users.unable_user');    
        Route::get('/users/{id}/enable_user', [UsersController::class , 'enable_user'])->name('users.enable_user');
        Route::resource('users', UsersController::class)->names('users');

        Route::resource('roles', RolesController::class)->names('roles');

        Route::resource('reportes', ReportesController::class)->names('reportes');


    });
});



