<?php

use Illuminate\Support\Facades\Route;
use App\Events\MessageSent;
use App\Models\Message;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\CountryController;


Route::get('/', function () {
    return view('welcome');
});


Route::prefix('employee')->group(function () {
    Route::get('/countries/fetch', [CountryController::class, 'fetchAll']);
    Route::get('/countries/search/{name}', [CountryController::class, 'search']);
    Route::post('/countries', [CountryController::class, 'store']);
    Route::get('/countries/added', [CountryController::class, 'added']);
});

Route::get('/countries/fetch', [CountryController::class, 'fetchAll']);
Route::get('/countries/search/{name}', [CountryController::class, 'search']);
