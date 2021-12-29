<?php

namespace App\Http\Controllers;

use App\Http\common\commonFeatures;
use App\Models\Divisional_secretariat;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DivisionalSecretariatController extends Controller
{
    use commonFeatures;
    public function save(Request $request){
        $validatedData= $request->validate([
            'name' => ['required'],
        ]);
        try {
            $Divisional_secretariat =new Divisional_secretariat();
            $Divisional_secretariat->districtId=$request->district;
            $Divisional_secretariat->name=$request->name;

            $save=$Divisional_secretariat->save();

            if($save){
                return $this->responseBody(true, "Divisional_secretariat", "save", "");
            }
            else{
            return $this->responseBody(false, "Divisional_secretariat", "error", null);

            }


        }
         catch (Exception $exception) {
            return $this->responseBody(false, "Divisional_secretariat", "error", $exception->getMessage());
        }
    }
    public function update(Request $request){
        $validatedData= $request->validate([
            'name' => ['required'],
        ]);
        try {

            $save=Divisional_secretariat::where('id',$request->id)
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
    public function loaddivitionalSecretariat(){
        try {
                $District=DB::table('divisional_secretariats')
                            ->join('districts','districts.id','=','divisional_secretariats.districtId')
                            ->select('divisional_secretariats.*','districts.district')
                            ->get();
                return $this->responseBody(true, "Divisional_secretariat", "found",$District );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "Divisional_secretariat", "error", $exception->getMessage());
        }
    }
    public function loaddivitionalSecretariatToid($id){
        try {
                $Divisional_secretariat=Divisional_secretariat::where('id',$id)->first();
                return $this->responseBody(true, "Divisional_secretariat", "found",$Divisional_secretariat );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "Divisional_secretariat", "error", $exception->getMessage());
        }
    }
    public function delete($id){
        try {
                $District=Divisional_secretariat::where('id',$id)->delete();
                return $this->responseBody(true, "Divisional_secretariat", "Deleted",null );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "Divisional_secretariat", "error", $exception->getMessage());
        }
    }
}
