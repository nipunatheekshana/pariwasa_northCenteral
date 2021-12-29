<?php

namespace App\Http\Controllers;

use App\Http\common\commonFeatures;
use App\Models\Probation_unit_employee;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class probationUnitEmployeeListController extends Controller
{
    use commonFeatures;

    public function loadProbationUnitEmployees(){
        try {
                $Probation_unit_employee=DB::table('probation_unit_employees')
                                                ->join('designations','designations.id','=','probation_unit_employees.designation')
                                                ->where('probation_unit_employees.Probation_unit_id','=',Auth::user()->probationUnitid)
                                                ->select('probation_unit_employees.*','designations.name as desigName')
                                                ->get();

                return $this->responseBody(true, "loadProbationUnitEmployees", "found",$Probation_unit_employee );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loadProbationCenters", "error", $exception->getMessage());
        }
    }
    public function delete($id){
        try {
                $Probation_unit_employee=Probation_unit_employee::where('employee_id',$id)->delete();
                return $this->responseBody(true, "Probation_unit_employee", "Deleted",null );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "Probation_unit_employee", "error", $exception->getMessage());
        }
    }
}
