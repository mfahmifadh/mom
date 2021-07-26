<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\recommendationController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
Route::get('materidetail/{id_materi}', [BerandaController::class, 'showDetail']);

Route::get('/recommendation', [recommendationController::class, 'recommendation']);
Route::get('/tesUas', function () {
    return 'tes';
});
Route::get('/admin/verifikasi-mentor', '\App\Http\Controllers\AdminController@verifikasi');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $id = Auth::id();
    $mentors = DB::table('users')
        ->where('users.role_id', '=', '3')
        ->join('mentor_data', 'users.id', '=', 'mentor_data.user_id')
        ->where('mentor_data.status_account', '=', '2')
        ->get();

    $booking = DB::table('booking')
        ->get();

    $data = [];
    $i = 0;

    foreach ($booking as $booking) {
        $data[$i] = $booking->class_id;
        $i++;
    }

    $materis = DB::table('class')
        // ->join('booking', 'class.id', '=', 'booking.class_id')
        ->whereNotIn('class.id', $data)
        ->get();
    // dd($materis);
    return view('dashboard', compact('mentors', 'materis'));
})->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'role:murid', 'prefix' => 'murid', 'as' => 'murid.'], function () {
        Route::resource('dashboard', \App\Http\Controllers\MuridController::class);
        Route::get('/dashboardmateri/{id_materi}', [MuridController::class, 'Detail']);
        Route::get('/recommendmentor', [MuridController::class, 'recommend']);
        Route::get('/class', [MuridController::class, 'GetClass']);
        Route::get('/mentor', [MuridController::class, 'GetMentor']);
        Route::get('/confirm_checkout', function () {
            return view('murid/confirm_checkout');
        });
        Route::get('/myclass', [MuridController::class, 'GetMyClass']);
        Route::get('/detail_myclass/{id}', [MuridController::class, 'GetMyClassDetail']);
        Route::get('/checkout/{id_materi}', [MuridController::class, 'checkout']);
        Route::get('/getTransaction', [MentorController::class, 'getTransaction']);
        Route::post('/add_priority', [MuridController::class, 'addPriority']);
        Route::get('/mentordetail/{id_mentor}', [MuridController::class, 'mentorDetail']);

        Route::post('/postBooking', [MuridController::class, 'Booking']);
    });
    Route::group(['middleware' => 'role:mentor', 'prefix' => 'mentor', 'as' => 'mentor.'], function () {
        Route::resource('dashboard', \App\Http\Controllers\MentorController::class);
        Route::get('/course/{id}', [MentorController::class, 'GetCourse']);
        Route::get('/booking', [MentorController::class, 'GetBooking']);
        Route::get('/income', [MentorController::class, 'GetIncome']);
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
    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('dashboard', \App\Http\Controllers\AdminController::class);
        Route::get('/transaction', [AdminController::class, 'transaction']);
        Route::get('/editTransaction/{id}', [AdminController::class, 'editTransaction']);
        Route::get('/checkReceipt/{id}', [AdminController::class, 'checkReceipt']);
    });
});
