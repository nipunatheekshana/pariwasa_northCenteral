<?php

namespace App\Http\Controllers;

use App\Http\common\commonFeatures;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class probationUnitUserListController extends Controller
{
    use commonFeatures;
    public function loadProbationUnitUsers(){
        try {
                // $User=User::where('role','probationUnitUser')->get();
                $User = DB::table('users')
            ->join('probation_units', 'users.probationUnitid', '=', 'probation_units.Probation_unit_id')
            ->where('users.role','=','probationUnitUser')
            ->select('users.*', 'probation_units.name as pname')
            ->get();
            return $this->responseBody(true, "loadProbationUnitUsers", "found",$User );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loadProbationUnitUsers", "error", $exception->getMessage());
        }
    }
    public function deleteProbationUnitUsers($id)
    {
        try {

            $User = User::where('id',$id)->delete();

            $response =  $this->responseBody(true, "deleteProbationUnitUsers", "deleted", null);
        } catch (Exception $exception) {
            $response =  $this->responseBody(false, "deleteProbationUnitUsers", "delete error", $exception->getMessage());
        }
        return $response;
    }
}
