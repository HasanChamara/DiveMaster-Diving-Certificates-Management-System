<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssessmentController;




Route::get('/', function () {
    return view('welcome');
});

Route::resource('assessments', AssessmentController::class);
