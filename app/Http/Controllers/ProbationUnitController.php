<?php

namespace App\Http\Controllers;

use App\Http\common\commonFeatures;
use App\Models\Probation_unit;
use Exception;
use Illuminate\Http\Request;

class ProbationUnitController extends Controller
{
    use commonFeatures;
    public function index(){
        return view('pages.register_Probation_unit');
    }
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
}
