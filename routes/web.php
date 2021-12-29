<?php

use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DivisionalSecretariatController;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\GramasevaDivisionController;
use App\Http\Controllers\LogInController;
use App\Http\Controllers\PoliceDivisionController;
use App\Http\Controllers\probationCenterCatagoryController;
use App\Http\Controllers\probationCenterController;
use App\Http\Controllers\probationCenterListController;
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


    // probation center
    Route::get('/createProbationCenter', function () {
        return view('pages.probationUnits.createProbationCenter');
    });
    Route::get('/createProbationCenter/loadcatagories', [probationCenterController::class, 'loadcatagories']);
    Route::post('/createProbationCenter/save',[probationCenterController::class,'save']);
    Route::post('/createProbationCenter/update',[probationCenterController::class,'update']);
    Route::get('/createProbationCenter/loadProbationCenter/{id}', [probationCenterController::class, 'loadProbationCenter']);


    // probationCenterCatagory
    Route::get('/probationCenterCatagory', function () {
        return view('pages.probationCenterCatagory');
    });
    Route::post('/probationCenterCatagory/save', [probationCenterCatagoryController::class, 'save']);
    Route::post('/probationCenterCatagory/update', [probationCenterCatagoryController::class, 'update']);
    Route::get('/probationCenterCatagory/loadcatagory', [probationCenterCatagoryController::class, 'loadcatagory']);
    Route::get('/probationCenterCatagory/loadcatagory/{id}', [probationCenterCatagoryController::class, 'loadcatagoryToid']);
    Route::delete('/probationCenterCatagory/delete/{id}', [probationCenterCatagoryController::class, 'delete']);


    // probation Center List
    Route::get('/probationCenterList', function () {
        return view('pages.probationUnits.probationCenterList');
    });
    Route::get('/probationCenterList/loadProbationCenters', [probationCenterListController::class, 'loadProbationCenters']);


    // registerProbationUnitEmployee
    Route::get('/registerProbationUnitEmployee', function () {
        return view('pages.probationUnits.registerProbationUnitEmployee');
    });

    // grade
    Route::get('/grade', function () {
        return view('pages.grade');
    });
    Route::post('/grade/save', [GradesController::class, 'save']);
    Route::post('/grade/update', [GradesController::class, 'update']);
    Route::get('/grade/loadGrade', [GradesController::class, 'loadGrade']);
    Route::get('/grade/loadGrade/{id}', [GradesController::class, 'loadGradeToid']);
    Route::delete('/grade/delete/{id}', [GradesController::class, 'delete']);

    //district
    Route::get('/district', function () {
        return view('pages.district');
    });
    Route::post('/district/save', [DistrictController::class, 'save']);
    Route::post('/district/update', [DistrictController::class, 'update']);
    Route::get('/district/loaddistrict', [DistrictController::class, 'loaddistrict']);
    Route::get('/district/loaddistrict/{id}', [DistrictController::class, 'loaddistrictToid']);
    Route::delete('/district/delete/{id}', [DistrictController::class, 'delete']);


    //divitionalSecretariat
    Route::get('/divitionalSecretariat', function () {
        return view('pages.divitionalSecretariat');
    });
    Route::post('/divitionalSecretariat/save', [DivisionalSecretariatController::class, 'save']);
    Route::post('/divitionalSecretariat/update', [DivisionalSecretariatController::class, 'update']);
    Route::get('/divitionalSecretariat/loaddivitionalSecretariat', [DivisionalSecretariatController::class, 'loaddivitionalSecretariat']);
    Route::get('/divitionalSecretariat/loaddivitionalSecretariat/{id}', [DivisionalSecretariatController::class, 'loaddivitionalSecretariatToid']);
    Route::delete('/divitionalSecretariat/delete/{id}', [DivisionalSecretariatController::class, 'delete']);


    //policedivition
    Route::get('/policeDivitions', function () {
        return view('pages.policedivition');
    });
    Route::post('/policeDivitions/save', [PoliceDivisionController::class, 'save']);
    Route::post('/policeDivitions/update', [PoliceDivisionController::class, 'update']);
    Route::get('/policeDivitions/loadpoliceDivitions', [PoliceDivisionController::class, 'loadpoliceDivitions']);
    Route::get('/policeDivitions/loadpoliceDivitions/{id}', [PoliceDivisionController::class, 'loadpoliceDivitionsToid']);
    Route::delete('/policeDivitions/delete/{id}', [PoliceDivisionController::class, 'delete']);

    // gramasevadivision
    Route::get('/gramasevadivision', function () {
        return view('pages.gramasevadivision');
    });
    Route::post('/gramasevadivision/save', [GramasevaDivisionController::class, 'save']);
    Route::post('/gramasevadivision/update', [GramasevaDivisionController::class, 'update']);
    Route::get('/gramasevadivision/loadgramasevadivision', [GramasevaDivisionController::class, 'loadpoliceDivitions']);
    Route::get('/gramasevadivision/loadgramasevadivision/{id}', [GramasevaDivisionController::class, 'loadgramasevadivisionToid']);
    Route::delete('/gramasevadivision/delete/{id}', [GramasevaDivisionController::class, 'delete']);
});
