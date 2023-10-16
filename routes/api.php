<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiNotificacionesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([ 'middleware' => 'auth:sanctum'], function(){
    Route::patch('/notificaciones/{proyectos_notificaciones_id}/leido', [ApiNotificacionesController::class , 'leido']); 
    Route::resource('notificaciones', ApiNotificacionesController::class);
});