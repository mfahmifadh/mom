<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MentorController;

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

Route::get('/', '\App\Http\Controllers\BerandaController@index');


Route::get('/admin/verifikasi-mentor', '\App\Http\Controllers\AdminController@verifikasi');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'role:murid', 'prefix' => 'murid', 'as' => 'murid.'], function () {
        Route::resource('dashboard', \App\Http\Controllers\MuridController::class);
    }); 
   Route::group(['middleware' => 'role:mentor', 'prefix' => 'mentor', 'as' => 'mentor.'], function() {
       Route::resource('dashboard', \App\Http\Controllers\MentorController::class);
       Route::get('/course/{id}', [MentorController::class, 'GetCourse']);
       Route::get('/addCourses', [MentorController::class, 'addCourses']);
       Route::get('/mentor_page/{id}', [MentorController::class, 'check_mentor']);
       Route::get('/detailCourse/{id}', [MentorController::class, 'GetDetailCourse']);
       //Post
       Route::post('/postDocument', [MentorController::class, 'PostDocument']);
       Route::post('/postCourse', [MentorController::class, 'PostCourse']);
       //Update
       Route::post('/updateCourse/{id}', [MentorController::class, 'UpdateCourse']);
       Route::get('/editCourse/{id}', [MentorController::class, 'EditCourse']);
       //Delete
       Route::delete('/deleteCourse/{id}', [MentorController::class, 'DeleteCourse']);
   });
    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::resource('dashboard', \App\Http\Controllers\AdminController::class);
    });
});
