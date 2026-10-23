<?php

use App\Http\Controllers\StudyController;
use Illuminate\Support\Facades\Route;

Route::controller(StudyController::class)
    ->prefix('study')
    ->group(function () {
        Route::get('/index', 'index');
        Route::get('/provideServices', 'provideServices');
});