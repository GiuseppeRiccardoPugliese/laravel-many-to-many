<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TypeController::class, 'index'])
    ->name('type.index');

Route::get('/projects', [ProjectController::class, 'index'])
    ->name('project.index');

//ROTTA CREATE
Route::get('/projects/create', [ProjectController::class, 'create'])
    ->name('project.create');

//ROTTA STORE    
Route::post('/projects/create', [ProjectController::class, 'store'])
    ->name('project.store');
