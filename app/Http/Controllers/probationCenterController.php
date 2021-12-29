<?php

namespace App\Http\Controllers;

use App\Http\common\commonFeatures;
use App\Models\District;
use App\Models\Divisional_secretariat;
use App\Models\Gramaseva_division;
use App\Models\Probation_center;
use App\Models\probationcenter_catagory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class probationCenterController extends Controller
{
    use commonFeatures;

    public function save(Request $request){
        $validatedData= $request->validate([
            'name' => ['required'],
            'date_started' => ['required'],
            'catagory' => ['required'],
            'district' => ['required'],
            'divitional_secretariat' => ['required'],
            'address' => ['required'],
            'registration_no' => ['required'],
            'registration_date' => ['required'],
            'fund' => ['required'],
            'gramaseva_divition' => ['required'],
            'maximum_children_capacity' => ['required'],
            'minimum_children_capacity' => ['required'],
            'telepone_no' => ['required','regex:/^(?:7|0|(?:\+94))[0-9]{9,10}$/'],

        ]);
        try{
            $probationCenter=new Probation_center();
            $probationCenter->name=$request->name;
            $probationCenter->date_started=$request->date_started;
            $probationCenter->catagory=$request->catagory;
            $probationCenter->district=$request->district;
            $probationCenter->divitional_secretariat=$request->divitional_secretariat;
            $probationCenter->Probation_unit_id=Auth::user()->probationUnitid;
            $probationCenter->address=$request->address;
            $probationCenter->tp_no=$request->telepone_no;
            $probationCenter->registration_no=$request->registration_no;
            $probationCenter->registration_date=$request->registration_date;
            $probationCenter->fund=$request->fund;
            $probationCenter->gramaseva_divition=$request->gramaseva_divition;
            $probationCenter->maximum_children_capacity=$request->maximum_children_capacity;
            $probationCenter->minimum_children_capacity=$request->minimum_children_capacity;

            $save=$probationCenter->save();
            if($save){
                $responseBody = $this->responseBody(true, "probationUnit", "saved",'data saved');

            }
        }
        catch(Exception $exception){
            $responseBody = $this->responseBody(false, "probationUnit", "error", $exception->getMessage());

        }
        return response()->json(["data" => $responseBody]);

    }
    public function update(Request $request){
        $validatedData= $request->validate([
            'name' => ['required'],
            'date_started' => ['required'],
            'catagory' => ['required'],
            'district' => ['required'],
            'divitional_secretariat' => ['required'],
            'address' => ['required'],
            'registration_no' => ['required'],
            'registration_date' => ['required'],
            'fund' => ['required'],
            'gramaseva_divition' => ['required'],
            'maximum_children_capacity' => ['required'],
            'minimum_children_capacity' => ['required'],
            'telepone_no' => ['required','regex:/^(?:7|0|(?:\+94))[0-9]{9,10}$/'],

        ]);
        try{

            $save=Probation_center::where('probation_center_id',$request->id)
            ->update(
                [
                    'name' => $request->name,
                    'date_started' => $request->date_started,
                    'catagory' => $request->catagory,
                    'district' => $request->district,
                    'divitional_secretariat' => $request->divitional_secretariat,
                    'address' => $request->address,
                    'tp_no' => $request->telepone_no,
                    'registration_no' => $request->registration_no,
                    'registration_date' => $request->registration_date,
                    'fund' => $request->fund,
                    'gramaseva_divition' => $request->gramaseva_divition,
                    'maximum_children_capacity' => $request->maximum_children_capacity,
                    'minimum_children_capacity' => $request->minimum_children_capacity,

                ]);
            if($save){
                $responseBody = $this->responseBody(true, "Probation_center", "Updated",'data saved');

            }
        }
        catch(Exception $exception){
            $responseBody = $this->responseBody(false, "probationUnit", "error", $exception->getMessage());

        }
        return response()->json(["data" => $responseBody]);

    }
    public function loadDistrict(){
        try {
            $District =District::all();

            return $this->responseBody(true, "loadDistrict", "found", $District);
        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loadDistrict", "error", $exception->getMessage());
        }
    }
    public function loadDivitionalSecatariat($id){
        try {
            $Divisional_secretariat =Divisional_secretariat::where('districtId',$id)->get();

            return $this->responseBody(true, "loadDivitionalSecatariat", "found", $Divisional_secretariat);
        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loadDivitionalSecatariat", "error", $exception->getMessage());
        }
    }
    public function loadGramasevadivision($id){
        try {
            $Gramaseva_division =Gramaseva_division::where('divisionalSecretariatID',$id)->get();

            return $this->responseBody(true, "loadGramasevadivision", "found", $Gramaseva_division);
        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loadGramasevadivision", "error", $exception->getMessage());
        }
    }
    public function loadcatagories(){
        try {
            $probationcenter_catagory =probationcenter_catagory::where('status',true)->get(['id','category']);

            return $this->responseBody(true, "loadProbationUnits", "found", $probationcenter_catagory);
        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loadProbationUnits", "error", $exception->getMessage());
        }
    }
    public function loadProbationCenter($id){
        try {
                $Probation_unit=Probation_center::where('probation_center_id',$id)->first();
                return $this->responseBody(true, "loadProbationCenter", "found",$Probation_unit );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loadProbationCenter", "error", $exception->getMessage());
        }
    }
}
