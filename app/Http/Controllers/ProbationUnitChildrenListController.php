<?php

namespace App\Http\Controllers;

use App\Http\common\commonFeatures;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProbationUnitChildrenListController extends Controller
{
    use commonFeatures;
    public function loadChildren(){
        try {
                // $Children = Child::where('probation_center_id',Auth::user()->probationCenterId)->get();
                $Children = DB::table('children')
                ->leftJoin('divisional_secretariats','divisional_secretariats.id','=','children.divitional_secretariat')
                ->leftJoin('gramaseva_divisions','gramaseva_divisions.id','=','children.gramaseva_divition')
                ->leftJoin('police_divisions','police_divisions.id','=','children.policeDivition')
                ->leftJoin('probation_centers','probation_centers.probation_center_id','=','children.probation_center_id')

                ->where('probation_centers.Probation_unit_id',Auth::user()->probationUnitid)
                ->select('children.*','divisional_secretariats.name as DistrictName','gramaseva_divisions.name as gramasewaname','police_divisions.name as policename')
                ->get();
            return $this->responseBody(true, "loadChildren", "found",$Children );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loadChildren", "error", $exception->getMessage());
        }
    }
}
