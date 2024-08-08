<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MaterialController;

// Home route
Route::get('/', function () {
    return view('dashboard');
});

// Resource routes for courses
Route::resource('courses', CourseController::class);

// Nested resource routes for materials
Route::resource('courses.materials', MaterialController::class);
