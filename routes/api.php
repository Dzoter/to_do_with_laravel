<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/task-all',[\App\Http\Controllers\Api\ToDoController::class,'showAllToDo']);

Route::get('/task-active',[\App\Http\Controllers\Api\ToDoController::class,'getAllActiveTasks']);

Route::get('/task-done',[\App\Http\Controllers\Api\ToDoController::class,'getAllDoneTasks']);

Route::get('/task-delete/{taskId}',[\App\Http\Controllers\Api\ToDoController::class,'deleteTask']);

Route::get('/task-finish/{taskId}',[\App\Http\Controllers\Api\ToDoController::class,'finishTask']);

Route::post('/task-add',[\App\Http\Controllers\Api\ToDoController::class,'addToDo']);
