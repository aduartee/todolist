<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// Routes to handle task
Route::get('/task', function() {
    return view('tasks');
});

Route::post('/task/register', [TaskController::class, 'registerNewTask']);

Route::post('/task/list', [TaskController::class, 'fetchAllTask']);


