<?php

namespace App\Http\Controllers;

use App\Http\common\commonFeatures;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminFilterEmployeecontroller extends Controller
{
    use commonFeatures;
    public function loadEmployees(){
        try {
                $Probation_unit_employee=DB::table('probation_unit_employees')
                                                ->leftJoin('designations','designations.id','=','probation_unit_employees.designation')
                                                // ->where('probation_unit_employees.Probation_unit_id','=',Auth::user()->probationUnitid)
                                                ->select('probation_unit_employees.*','designations.name as desigName')
                                                ->get();

                return $this->responseBody(true, "loadProbationUnitEmployees", "found",$Probation_unit_employee );
                // return 'ok';

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loadEmployees", "error", $exception->getMessage());
        }
    }
}
