<?php
use App\Models\Tour;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin/tour')->middleware('auth')->group(function (){
    Route::get('/manage', [\App\Http\Controllers\AdminTourController::class,'ShowTours'])->name('manage');
    Route::get('/create/', [\App\Http\Controllers\AdminTourController::class,'createtour'])->middleware('CheckFreePackage');
    Route::post('/edit/{id}', [\App\Http\Controllers\AdminTourController::class,'edittour']);
    Route::post('/save/{id}', [\App\Http\Controllers\AdminTourController::class,'saveedittour']);
    Route::post('/save', [\App\Http\Controllers\AdminTourController::class,'savetour']);
    Route::post('/delete/{id}', [\App\Http\Controllers\AdminTourController::class,'deletetour']);
    Route::post('/deactive/{id}', [\App\Http\Controllers\AdminTourController::class,'deactivetour']);
    Route::post('/active/{id}', [\App\Http\Controllers\AdminTourController::class,'activetour']);
});

Route::get('/serv' , [\App\Http\Controllers\TourController::class, 'getTour'])->name('main');
Route::post('/search' , [\App\Http\Controllers\TourController::class, 'search']);
Route::post('/tour/{id}' , [\App\Http\Controllers\TourController::class, 'showtour']);
Route::get('/tourist/saman' , [\App\Http\Controllers\TourController::class, 'getTours']);

Route::get('/service' , function () {
    return view('welcome');
});

Route::get('/sam' , [\App\Http\Controllers\AdminTourController::class, 'sam']);
Route::get('/jsontour' , [\App\Http\Controllers\AdminTourController::class, 'jsonTours']);
Route::get('/testapi' , [\App\Http\Controllers\AdminTourController::class, 'testApi']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
