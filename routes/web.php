<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;




Route::post('/tasks/reorder', [TaskController::class, 'reorder'])->name('tasks.reorder');

Route::resource('projects', ProjectController::class);

Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::post('/tasks/reorder', [TaskController::class, 'reorder'])->name('tasks.reorder');
Route::get('/tasks/project', [TaskController::class, 'filterByProject'])->name('tasks.filterByProject');

