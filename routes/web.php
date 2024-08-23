<?php

use App\Http\Controllers\ScrapingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/run-script', [ScrapingController::class, 'runScript']);

#Route::get('/check-file-path', [ScrapingController::class, 'checkFilePath']);


