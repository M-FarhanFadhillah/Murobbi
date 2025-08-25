<?php

use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\EducationController;
use App\Http\Controllers\Api\LapkeuController;
use App\Http\Controllers\Api\MasjidController;
use App\Http\Controllers\Api\userController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/lapkeu/{id}', [LapkeuController::class, 'lapkeu']); //id masjid
Route::get('/banner', [BannerController::class, 'banner']); 
Route::get('/edu/book', [EducationController::class, 'book']);
Route::get('/edu/video', [EducationController::class, 'video']);
Route::get('/masjid', [MasjidController::class, 'index']);
Route::get('/masjid/{id}', [MasjidController::class, 'masjid']);
Route::get('/user/{id}', [userController::class, 'user']);

