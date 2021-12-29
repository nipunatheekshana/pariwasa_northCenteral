<?php

namespace App\Http\Controllers;

use App\Http\common\commonFeatures;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class probationCenterUserListController extends Controller
{
    use commonFeatures;
    public function loadProbationCenterUsers(){
        try {
                $User = DB::table('users')
            ->join('probation_centers', 'users.probationCenterId', '=', 'probation_centers.probation_center_id')
            ->where('users.role','=','probationCenterUser')
            ->where('probation_centers.Probation_unit_id','=',Auth::user()->probationUnitid)
            ->select('users.*', 'probation_centers.name as Cname')
            ->get();
            return $this->responseBody(true, "loadProbationUnitUsers", "found",$User );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loadProbationUnitUsers", "error", $exception->getMessage());
        }
    }
    public function deleteProbationCenterUsers($id)
    {
        try {

            $User = User::where('id',$id)->delete();

            $response =  $this->responseBody(true, "deleteProbationCenterUsers", "deleted", null);
        } catch (Exception $exception) {
            $response =  $this->responseBody(false, "deleteProbationCenterUsers", "delete error", $exception->getMessage());
        }
        return $response;
    }
}
