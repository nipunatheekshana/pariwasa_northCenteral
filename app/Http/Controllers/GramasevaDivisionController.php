<?php

namespace App\Http\Controllers;

use App\Http\common\commonFeatures;
use App\Models\Gramaseva_division;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GramasevaDivisionController extends Controller
{
    use commonFeatures;
    public function save(Request $request){
        $validatedData= $request->validate([
            'name' => ['required'],
        ]);
        try {
            $Gramaseva_division =new Gramaseva_division();
            $Gramaseva_division->divisionalSecretariatID=$request->divitional_secretariat;
            $Gramaseva_division->name=$request->name;

            $save=$Gramaseva_division->save();

            if($save){
                return $this->responseBody(true, "Gramaseva_division", "save", "");
            }
            else{
            return $this->responseBody(false, "Gramaseva_division", "error", null);

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
            $save=Gramaseva_division::where('id',$request->id)
            ->update(
                [
                    'divisionalSecretariatID' => $request->divitional_secretariat,
                    'name' => $request->name,

                ]);

            if($save){
                return $this->responseBody(true, "Gramaseva_division", "save", "");
            }
            else{
            return $this->responseBody(false, "Gramaseva_division", "error", null);

            }


        }
         catch (Exception $exception) {
            return $this->responseBody(false, "Vendor", "error", $exception->getMessage());
        }
    }
    public function loadpoliceDivitions(){
        try {
                $District=DB::table('gramaseva_divisions')
                            ->join('divisional_secretariats','divisional_secretariats.id','=','gramaseva_divisions.divisionalSecretariatID')
                            ->select('gramaseva_divisions.*','divisional_secretariats.name as DVSname')
                            ->get();
                return $this->responseBody(true, "Divisional_secretariat", "found",$District );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "Divisional_secretariat", "error", $exception->getMessage());
        }
    }
    public function loadgramasevadivisionToid($id){
        try {
                $Gramaseva_division=Gramaseva_division::where('id',$id)->first();
                return $this->responseBody(true, "Police_division", "found",$Gramaseva_division );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "Police_division", "error", $exception->getMessage());
        }
    }
    public function delete($id){
        try {
                $Gramaseva_division=Gramaseva_division::where('id',$id)->delete();
                return $this->responseBody(true, "Gramaseva_division", "Deleted",null );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "Gramaseva_division", "error", $exception->getMessage());
        }
    }
}
