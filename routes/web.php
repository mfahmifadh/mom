<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\BerandaController;

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
//     return view('index');
// });

Route::get('/', [BerandaController::class, 'show']);
Route::get('/indexmentor', [BerandaController::class, 'showMentor']);
Route::get('/indexmateri', [BerandaController::class, 'showMateri']);


Route::get('/admin/verifikasi-mentor', '\App\Http\Controllers\AdminController@verifikasi');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'role:murid', 'prefix' => 'murid', 'as' => 'murid.'], function () {
        Route::resource('dashboard', \App\Http\Controllers\MuridController::class);
    });
    Route::group(['middleware' => 'role:mentor', 'prefix' => 'mentor', 'as' => 'mentor.'], function () {
        Route::resource('dashboard', \App\Http\Controllers\MentorController::class);
        Route::get('/course', function () {
            return view('mentor.page_course');
        });
        Route::get('/addCourses', [MentorController::class, 'addCourses']);
        Route::get('/mentor_page/{id}', [MentorController::class, 'check_mentor']);
        //Post
        Route::post('/postDocument', [MentorController::class, 'PostDocument']);
    });
    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('dashboard', \App\Http\Controllers\AdminController::class);
    });
});
