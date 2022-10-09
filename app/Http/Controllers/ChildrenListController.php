<?php

namespace App\Http\Controllers;

use App\Http\common\commonFeatures;
use App\Models\Child;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChildrenListController extends Controller
{
    use commonFeatures;
    public function loadChildren(){
        try {
                // $Children = Child::where('probation_center_id',Auth::user()->probationCenterId)->get();
                $Children = DB::table('children')
                ->leftJoin('divisional_secretariats','divisional_secretariats.id','=','children.divitional_secretariat')
                ->leftJoin('gramaseva_divisions','gramaseva_divisions.id','=','children.gramaseva_divition')
                ->leftJoin('police_divisions','police_divisions.id','=','children.policeDivition')
                ->where('children.probation_center_id',Auth::user()->probationCenterId)
                ->select('children.*','divisional_secretariats.name as DistrictName','gramaseva_divisions.name as gramasewaname','police_divisions.name as policename')
                ->get();
            return $this->responseBody(true, "loadChildren", "found",$Children );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loadChildren", "error", $exception->getMessage());
        }
    }
    public function delete($id){
        try {
                $image=Child::where('id',$id)->first()->image;
                if(file_exists($image)){
                    unlink($image);
                }

                $Child=Child::where('id',$id)->delete();
                return $this->responseBody(true, "Child", "Deleted",null );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "Child", "error", $exception->getMessage());
        }
    }
}
