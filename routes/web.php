<?php

use App\Http\Controllers\adminChildrenFilterController;
use App\Http\Controllers\ChildrenListController;
use App\Http\Controllers\ChildrenRegisterController;
use App\Http\Controllers\designationController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DivisionalSecretariatController;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\GramasevaDivisionController;
use App\Http\Controllers\LogInController;
use App\Http\Controllers\passwordChangeController;
use App\Http\Controllers\PoliceDivisionController;
use App\Http\Controllers\probationCenterCatagoryController;
use App\Http\Controllers\probationCenterController;
use App\Http\Controllers\probationCenterListController;
use App\Http\Controllers\ProbationCenterUserDashbordController;
use App\Http\Controllers\probationCenterUserListController;
use App\Http\Controllers\ProbationUnitController;
use App\Http\Controllers\probationUnitEmployeeController;
use App\Http\Controllers\probationUnitEmployeeListController;
use App\Http\Controllers\probationUnitListController;
use App\Http\Controllers\ProbationUnitUserDashbordController;
use App\Http\Controllers\probationUnitUserListController;
use App\Http\Controllers\symlincController;
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




    //adminDashboard
    Route::get('/Admindashbord', function () {
        return view('pages.Admin.dashbord');
    });

    // probationUnitUserDashbord
    Route::get('/probationUnitUserDashbord', function () {
        return view('pages.probationUnits.dashbord');
    });
    Route::get('/probationUnitUserDashbord/loadProbationUnitID', [ProbationUnitUserDashbordController::class, 'loadProbationUnitID']);

    // probationCenterUserDashbord
    Route::get('/probationCenterUserDashbord', function () {
        return view('pages.probationCenters.dashbord');
    });
    Route::get('/probationCenterUserDashbord/loadProbationCenterID', [ProbationCenterUserDashbordController::class, 'loadProbationCenterID']);




    //changePassword
    Route::post('/changepassword/changePassword', [passwordChangeController::class, 'changePassword']);


    //probation Unit
    Route::get('/createProbationUnit', function () {
        return view('pages.Admin.createProbationUnit');
    });
    Route::post('/register_Probation_unit/save',[ProbationUnitController::class,'save']);
    Route::post('/register_Probation_unit/update',[ProbationUnitController::class,'update']);
    Route::get('/register_Probation_unit/loadProbationUnit/{id}', [ProbationUnitController::class, 'loadProbationUnit']);
    Route::get('/register_Probation_unit/loadDistrict', [ProbationUnitController::class, 'loadDistrict']);
    Route::get('/register_Probation_unit/loadOfficer/{id}', [ProbationUnitController::class, 'loadOfficer']);


    Route::get('/register_Probation_unit/loadDivitionalSecatariat/{id}', [ProbationUnitController::class, 'loadDivitionalSecatariat']);

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
    Route::get('/createProbationCenter/loadDistrict', [probationCenterController::class, 'loadDistrict']);
    Route::get('/createProbationCenter/loadDivitionalSecatariat/{id}', [probationCenterController::class, 'loadDivitionalSecatariat']);
    Route::get('/createProbationCenter/loadGramasevadivision/{id}', [probationCenterController::class, 'loadGramasevadivision']);

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
    Route::get('/registerProbationUnitEmployee/loadpoliceDevition', [probationUnitEmployeeController::class, 'loadpoliceDevition']);

    Route::post('/registerProbationUnitEmployee/save',[probationUnitEmployeeController::class,'save']);
    Route::post('/registerProbationUnitEmployee/update',[probationUnitEmployeeController::class,'update']);
    Route::get('/registerProbationUnitEmployee/loadProbationUnitEmployee/{id}', [probationUnitEmployeeController::class, 'loadProbationUnitEmployee']);


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

    // designation

    Route::get('/designation', function () {
        return view('pages.designation');
    });
    Route::post('/designation/save', [designationController::class, 'save']);
    Route::post('/designation/update', [designationController::class, 'update']);
    Route::get('/designation/loaddesignation', [designationController::class, 'loaddesignation']);
    Route::get('/designation/loaddesignation/{id}', [designationController::class, 'loaddesignationToid']);
    Route::delete('/designation/delete/{id}', [designationController::class, 'delete']);

    // probationUnitEmployeeList
    Route::get('/probationUnitEmployeeList', function () {
        return view('pages.probationUnits.probationUnitEmployeeList');
    });
    Route::get('/probationUnitEmployeeList/loadProbationUnitEmployees', [probationUnitEmployeeListController::class, 'loadProbationUnitEmployees']);
    Route::delete('/probationUnitEmployeeList/delete/{id}', [probationUnitEmployeeListController::class, 'delete']);

    //createProbationCenterUsers
    Route::get('/createProbationCenterUsers', function () {
        return view('pages.probationUnits.createProbationCenterUsers');
    });
    Route::post('/createProbationCenterUsers/saveProbationCenterUser',[userController::class,'saveProbationCenterUser']);
    Route::get('/createProbationCenterUsers/loadProbationCenters', [userController::class, 'loadProbationCenters']);
    Route::get('/createProbationCenterUsers/loadProbationCenterUser/{id}', [userController::class, 'loadProbationCenterUser']);

    // probationCenterUserList
    Route::get('/probationCenterUserList', function () {
        return view('pages.probationUnits.probationCenterUserList');
    });
    Route::get('/probationCenterUserList/loadProbationCenterUsers', [probationCenterUserListController::class, 'loadProbationCenterUsers']);
    Route::delete('/probationCenterUserList/deleteProbationCenterUsers/{id}', [probationCenterUserListController::class, 'deleteProbationCenterUsers']);


    // registerChildren
    Route::get('/registerChildren', function () {
        return view('pages.probationCenters.registerChildren');
    });
    Route::post('/registerChildren/save',[ChildrenRegisterController::class,'save']);
    Route::post('/registerChildren/update',[ChildrenRegisterController::class,'update']);

    Route::get('/registerChildren/loadChild/{id}', [ChildrenRegisterController::class, 'loadChild']);


    // childrenList
    Route::get('/childrenList', function () {
        return view('pages.probationCenters.childrenList');
    });
    Route::get('/childrenList/loadChildren', [ChildrenListController::class, 'loadChildren']);
    Route::delete('/childrenList/delete/{id}', [ChildrenListController::class, 'delete']);

    // adminFilterChildren
    Route::get('/adminFilterChildren', function () {
        return view('pages.Admin.filterChildren');
    });
    Route::get('/adminFilterChildren/loadChildren', [adminChildrenFilterController::class, 'loadChildren']);
    Route::get('/adminFilterChildren/loadData', [adminChildrenFilterController::class, 'loadData']);
    Route::get('/adminFilterChildren/loadPbCenter', [adminChildrenFilterController::class, 'loadPbCenter']);
    Route::get('/adminFilterChildren/loadPbOffice', [adminChildrenFilterController::class, 'loadPbOffice']);
    Route::get('/adminFilterChildren/loadPbCenterToUnit/{id}', [adminChildrenFilterController::class, 'loadPbCenterToUnit']);



});
