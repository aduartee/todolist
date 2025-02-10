<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('home');
});

// Routes to handle task
Route::get('/task', function() {
    return view('tasks');
});

Route::post('/task/create', [TaskController::class, 'createNewTask']);

Route::post('/task/list', [TaskController::class, 'fetchAllTasks']);