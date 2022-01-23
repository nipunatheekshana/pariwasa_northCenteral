<?php

namespace App\Http\Controllers;

use App\Http\common\commonFeatures;
use App\Models\Police_division;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PoliceDivisionController extends Controller
{
    use commonFeatures;
    public function save(Request $request){
        $validatedData= $request->validate([
            'name' => ['required'],
        ]);
        try {
            $Police_division =new Police_division();
            $Police_division->districtId=$request->district;
            $Police_division->name=$request->name;

            $save=$Police_division->save();

            if($save){
                return $this->responseBody(true, "Police_division", "save", "");
            }
            else{
            return $this->responseBody(false, "Police_division", "error", null);

            }


        }
         catch (Exception $exception) {
            return $this->responseBody(false, "Police_division", "error", $exception->getMessage());
        }
    }
    public function update(Request $request){
        $validatedData= $request->validate([
            'name' => ['required'],
        ]);
        try {
            $save=Police_division::where('id',$request->id)
            ->update(
                [
                    'districtId' => $request->district,
                    'name' => $request->name,

                ]);

            if($save){
                return $this->responseBody(true, "District", "save", "");
            }
            else{
            return $this->responseBody(false, "District", "error", null);

            }


        }
         catch (Exception $exception) {
            return $this->responseBody(false, "Vendor", "error", $exception->getMessage());
        }
    }
    public function loadpoliceDivitions(){
        try {
                $District=DB::table('police_divisions')
                            ->join('districts','districts.id','=','police_divisions.districtId')
                            ->select('police_divisions.*','districts.district')
                            ->get();
                return $this->responseBody(true, "loadpoliceDivitions", "found",$District );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loadpoliceDivitions", "error", $exception->getMessage());
        }
    }
    public function loadpoliceDivitionsToid($id){
        try {
                $Police_division=Police_division::where('id',$id)->first();
                return $this->responseBody(true, "Police_division", "found",$Police_division );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "Police_division", "error", $exception->getMessage());
        }
    }
    public function delete($id){
        try {
                $Police_division=Police_division::where('id',$id)->delete();
                return $this->responseBody(true, "Police_division", "Deleted",null );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "Police_division", "error", $exception->getMessage());
        }
    }
}
