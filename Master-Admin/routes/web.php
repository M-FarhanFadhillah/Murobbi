<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\userController;
use App\Http\Controllers\educationController;
use App\Http\Controllers\bannerController;
use App\Http\Controllers\masjidController;
use App\Http\Controllers\LapKeuController;
use App\Http\Controllers\AdminsController;
use App\Models\activity;
use App\Models\admins;
use App\Models\banner;
use App\Models\masjid;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/', function () {
//     return view('login',[
//         "title" => "Login",
//     ]);
// });
Route::get('/test', function () {
        return view('cetaklapkeu',[
                "title" => "Masjid",
            ]);
        });
        
Route::post('/login', [AdminsController::class, 'authenticate']);
Route::get('/', [AdminsController::class, 'index']);
Route::get('actionlogout', [AdminsController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
//Delete Activitues
Route::get('/delAct/{id}/{activity_name}', [activityController::class, 'delate'])->middleware('auth');
//Delete Education
Route::get('/dellEdu/{id}/{judul}', [educationController::class, 'delate'])->middleware('auth');
//Delete Banner
Route::get('/dellbanner/{id}/{judul}', [bannerController::class, 'delate'])->middleware('auth');
//Delete UserList
Route::get('/delate/{id}/{name}', [userController::class, 'delate'])->middleware('auth');
//Delete Masjid
Route::get('/delMasjid/{id}/{masjid_name}', [masjidController::class, 'delate'])->middleware('auth');
//Update Status Banner
Route::post('/ActiveBanner/{id}/{judul}', [bannerController::class, 'update'])->middleware('auth');
//Update Status Banner
Route::post('/NonActiveBanner/{id}/{judul}', [bannerController::class, 'updateNonActive'])->middleware('auth');
//Accept Status User
Route::get('/ActiveUser/{id}/{name}', [UserController::class, 'updateStatus'])->middleware('auth');
//Refuse Status User
Route::get('/RefuseUser/{id}/{name}', [UserController::class, 'RefuseUser'])->middleware('auth');
//Update Password Userlist
Route::post('/updatePass/{id}/{name}', [userController::class, 'update'])->middleware('auth');
// Route::post('actionlogin', [AdminsController::class, 'actionlogin'])->name('actionlogin');
Route::get('/home', [userController::class, 'dashboard'])->middleware('auth');
Route::get('/masjid', [masjidController::class, 'index'])->middleware('auth');
Route::get('/listmasjid', [masjidController::class, 'listMasjid'])->middleware('auth');
// Routes Register Masjid Baru
Route::post('/listmasjid', [masjidController::class, 'store'])->middleware('auth');
Route::get('/users', [userController::class, 'index'])->middleware('auth');
Route::get('/listUser', [userController::class, 'listUser'])->middleware('auth');
// Routes Register Jamaah Baru
Route::post('/listUser', [userController::class, 'store'])->middleware('auth');
Route::get('/validateRegist', [userController::class, 'validateUser'])->middleware('auth');
Route::get('/banner', [bannerController::class, 'index'])->middleware('auth');
// Routes Register banner Baru
Route::post('/banner', [bannerController::class, 'store'])->middleware('auth');
Route::get('/edu', [educationController::class, 'index'])->middleware('auth');
// Routes Register Content Education Baru
Route::post('/edu', [educationController::class, 'store'])->middleware('auth');
Route::get('/financereport', [LapKeuController::class, 'index'])->middleware('auth');
// Cetak Lapkeu
Route::get('/cetak/{id}/{masjid_name}', [LapKeuController::class, 'cetaklapkeu'])->middleware('auth');
Route::get('/lapkeu/{id}/{masjid_name}', [LapKeuController::class, 'lapkeu'])->middleware('auth');
Route::post('/lapkeu/{id}', [LapKeuController::class, 'store'])->middleware('auth');
Route::get('/ziswaf/{id}/{masjid_name}', [LapKeuController::class, 'ziswaf'])->middleware('auth');
// Route::get('/ziswaf', [LapKeuController::class, 'ziswaf'])->middleware('auth');
Route::get('/activity', [activityController::class, 'index'])->middleware('auth');
Route::get('/activity/{id}/{masjid_name}', [activityController::class, 'listActivity'])->middleware('auth');
Route::post('/activity/{id}', [activityController::class, 'store'])->middleware('auth');
// Route::get('/activitylist', [activityController::class, 'listActivity']);
// Cetak PDF Lapkeu DOMPDF
// Route::get('/lapkeu/{id}/{masjid_name}/cetak', [LapKeuController::class, 'cetaklapkeu'])->middleware('auth');

