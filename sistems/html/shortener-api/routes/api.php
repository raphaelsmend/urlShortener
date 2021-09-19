<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Api\UrlController;
use Api\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('/Url', UrlController::class);

Route::post('/login', LoginController::class);
