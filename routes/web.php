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


Route::get('/', [\App\Http\Controllers\ToDoController::class,'showAllToDo'])->name('allToDo');

Route::post('create-task/submit',[\App\Http\Controllers\ToDoController::class,'addToDo'])->name('create-task');

Route::get('/task-delete/{taskId}', [\App\Http\Controllers\ToDoController::class,'deleteTask'])->name('deleteTask');

Route::get('/task-finish/{taskId}', [\App\Http\Controllers\ToDoController::class,'finishTask'])->name('finishTask');

Route::get('/task-active', [\App\Http\Controllers\ToDoController::class,'getAllActiveTasks'])->name('activeTasks');
Route::get('/task-done', [\App\Http\Controllers\ToDoController::class,'getAllDoneTasks'])->name('doneTasks');






