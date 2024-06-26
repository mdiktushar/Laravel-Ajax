<?php

use App\Http\Controllers\SearchController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('student.index');
});


Route::resource('student', StudentController::class);
Route::get('all-Students', [StudentController::class, 'students'])->name('all-students');

Route::get('/search', [SearchController::class, 'search'])->name('search');
