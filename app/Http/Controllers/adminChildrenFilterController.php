<?php

namespace App\Http\Controllers;
use App\Http\common\commonFeatures;
use App\Models\Child;
use App\Models\Probation_center;
use App\Models\Probation_unit;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminChildrenFilterController extends Controller
{
    use commonFeatures;
    public function loadChildren(){
        try {
            // $Children = Child::all();
            $Children = DB::table('children')
                            ->leftJoin('divisional_secretariats','divisional_secretariats.id','=','children.divitional_secretariat')
                            ->leftJoin('gramaseva_divisions','gramaseva_divisions.id','=','children.gramaseva_divition')
                            ->leftJoin('police_divisions','police_divisions.id','=','children.policeDivition')
                            ->select('children.*','divisional_secretariats.name as DistrictName','gramaseva_divisions.name as gramasewaname','police_divisions.name as policename')
                            ->get();


            return $this->responseBody(true, "loadChildren", "found",$Children );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loadChildren", "error", $exception->getMessage());
        }
    }
    public function loadData(Request $request){
        try {
            // $Asset=Child::where('probation_center_id',$request->probation_center_id);
            $Asset=DB::table('children')
            ->leftJoin('divisional_secretariats','divisional_secretariats.id','=','children.divitional_secretariat')
            ->leftJoin('gramaseva_divisions','gramaseva_divisions.id','=','children.gramaseva_divition')
            ->leftJoin('police_divisions','police_divisions.id','=','children.policeDivition');


            if(!$request->probation_center_id==null){
                $Asset->where('children.probation_center_id',$request->probation_center_id);
            }
            if(!$request->Probation_unit_id==null){
                $Asset->leftJoin('probation_centers','children.probation_center_id','=','probation_centers.probation_center_id');
                $Asset->leftJoin('probation_units','probation_centers.Probation_unit_id','=','probation_units.Probation_unit_id');
                $Asset->where('probation_units.Probation_unit_id',$request->Probation_unit_id);
            }
            if(!$request->gender==null){
                $Asset->where('children.gender',$request->gender);
            }
            $result =$Asset->select('children.*','divisional_secretariats.name as DistrictName','gramaseva_divisions.name as gramasewaname','police_divisions.name as policename')->get();


            return $this->responseBody(true, "loadData", "found",$result );

        }
        catch (Exception $exception) {
            return $this->responseBody(false, "loadData", "error", $exception->getMessage());
        }
    }
    public function loadPbCenter(){
        try {
                $Probation_center=Probation_center::all();

                return $this->responseBody(true, "loadPbCenter", "found",$Probation_center );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loadPbCenter", "error", $exception->getMessage());
        }
    }
    public function loadPbOffice(){
        try {
                $Probation_center=Probation_unit::all();

                return $this->responseBody(true, "loadPbOffice", "found",$Probation_center );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loadPbOffice", "error", $exception->getMessage());
        }
    }
    public function loadPbCenterToUnit($id){
        try {
                $Probation_center=Probation_center::where('Probation_unit_id',$id)->get();

                return $this->responseBody(true, "loadPbCenter", "found",$Probation_center );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loadPbCenter", "error", $exception->getMessage());
        }
    }
}
