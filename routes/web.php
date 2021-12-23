<?php

use App\Http\Controllers\LogInController;
use App\Http\Controllers\ProbationUnitController;
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
    return view('login');
});

//login
Route::post('/login', [LogInController::class, 'login']);

//logout
Route::get('/logout', [LogInController::class, 'logout'])->name('logout');

Route::group(['middleware'=>['is.logged']],function(){ //logged users route group

    //dashboard
    Route::get('/dashbord', function () {
        return view('sample');
    });


    //probation Unit
    Route::get('/createProbationUnit', function () {
        return view('pages.Admin.createProbationUnit');
    });
    Route::post('/register_Probation_unit/save',[ProbationUnitController::class,'save']);

});
