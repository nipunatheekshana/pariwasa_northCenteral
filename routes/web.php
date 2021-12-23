<?php

use App\Http\Controllers\LogInController;
use App\Http\Controllers\ProbationUnitController;
use App\Http\Controllers\probationUnitListController;
use App\Http\Controllers\probationUnitUserListController;
use App\Http\Controllers\userController;
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
    Route::post('/register_Probation_unit/update',[ProbationUnitController::class,'update']);

    Route::get('/register_Probation_unit/loadProbationUnit/{id}', [ProbationUnitController::class, 'loadProbationUnit']);


    //Probation Unit List
    Route::get('/probationUnitList', function () {
        return view('pages.Admin.probationUnitList');
    });
    Route::get('/probationUnitList/loadProbationUnits', [probationUnitListController::class, 'loadProbationUnits']);

    //createProbationUnitUser
    Route::get('/createProbationUnitUser', function () {
        return view('pages.Admin.createProbationUnitUser');
    });
    Route::post('/createProbationUnitUser/saveProbationUnitUser',[userController::class,'saveProbationUnitUser']);
    Route::get('/createProbationUnitUser/loadProbationUnits', [userController::class, 'loadProbationUnits']);
    Route::get('/createProbationUnitUser/loadProbationUnitUser/{id}', [userController::class, 'loadProbationUnitUser']);


    // probationUnitUserList
    Route::get('/probationUnitUserList', function () {
        return view('pages.Admin.probationUnitUserList');
    });
    Route::get('/probationUnitUserList/loadProbationUnitUsers', [probationUnitUserListController::class, 'loadProbationUnitUsers']);
    Route::delete('/probationUnitUserList/deleteProbationUnitUsers/{id}', [probationUnitUserListController::class, 'deleteProbationUnitUsers']);

});
