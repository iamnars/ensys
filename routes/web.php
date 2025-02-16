<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradingController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/grading', function () {
//     return view('grading');
// });

// Route::get('/grading/{schedule_code}', function ($schedule_code) {

//     return view('grading', compact('schedule_code'));
// });

Route::get('/grading/{schedule_code}', [GradingController::class, 'grading'])->name('grading');

