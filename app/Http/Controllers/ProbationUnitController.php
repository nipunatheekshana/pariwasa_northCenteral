<?php

namespace App\Http\Controllers;

use App\Http\common\commonFeatures;
use App\Models\District;
use App\Models\Divisional_secretariat;
use App\Models\Probation_unit;
use Exception;
use Illuminate\Http\Request;

class ProbationUnitController extends Controller
{
    use commonFeatures;

    public function save(Request $request){
        $validatedData= $request->validate([
            'name' => ['required'],
            'address' => ['required'],
            'district' => ['required'],
            'divitional_secretariat' => ['required'],
            'senior_officer' => ['required'],
            'officer_incharge' => ['required'],
            'telepone_no' => ['required','regex:/^(?:7|0|(?:\+94))[0-9]{9,10}$/'],
            'fax' => ['required','regex:/^(?:7|0|(?:\+94))[0-9]{9,10}$/'],
            'email' => ['required','email'],

        ]);
        try{
            $probationUnit=new Probation_unit();
            $probationUnit->name=$request->name;
            $probationUnit->address=$request->address;
            $probationUnit->district=$request->district;
            $probationUnit->divitional_secretariat=$request->divitional_secretariat;
            $probationUnit->senior_officer=$request->senior_officer;
            $probationUnit->officer_incharge=$request->officer_incharge;
            $probationUnit->tp_no=$request->telepone_no;
            $probationUnit->fax=$request->fax;
            $probationUnit->email=$request->email;
            $probationUnit->remarks=$request->remarks;

            $save=$probationUnit->save();
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
            'address' => ['required'],
            'district' => ['required'],
            'divitional_secretariat' => ['required'],
            'senior_officer' => ['required'],
            'officer_incharge' => ['required'],
            'telepone_no' => ['required','regex:/^(?:7|0|(?:\+94))[0-9]{9,10}$/'],
            'fax' => ['required','regex:/^(?:7|0|(?:\+94))[0-9]{9,10}$/'],
            'email' => ['required','email'],

        ]);
        try{
            $save=Probation_unit::where('Probation_unit_id',$request->id)
            ->update(
                [
                    'name' => $request->name,
                    'address' => $request->address,
                    'district' => $request->district,
                    'divitional_secretariat' => $request->divitional_secretariat,
                    'senior_officer' => $request->senior_officer,
                    'officer_incharge' => $request->officer_incharge,
                    'tp_no' => $request->telepone_no,
                    'fax' => $request->fax,
                    'email' => $request->email,
                    'remarks' => $request->remarks,
                ]);

            if($save){
                $responseBody = $this->responseBody(true, "probationUnit", "saved",'data saved');

            }
        }
        catch(Exception $exception){
            $responseBody = $this->responseBody(false, "probationUnit", "error", $exception->getMessage());

        }
        return response()->json(["data" => $responseBody]);

    }

    public function loadProbationUnit($id){
        try {
                $Probation_unit=Probation_unit::where('Probation_unit_id',$id)->first();
                return $this->responseBody(true, "loadProbationUnit", "found",$Probation_unit );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loadProbationUnit", "error", $exception->getMessage());
        }
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
}
