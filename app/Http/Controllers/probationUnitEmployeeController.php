<?php

namespace App\Http\Controllers;

use App\Http\common\commonFeatures;
use App\Models\Police_division;
use App\Models\Probation_unit_employee;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class probationUnitEmployeeController extends Controller
{
    use commonFeatures;

    public function save(Request $request){
        $validatedData= $request->validate([
            'name' => ['required'],
            'contact_no' => ['required','regex:/^(?:7|0|(?:\+94))[0-9]{9,10}$/'],
            'email' => ['required','email'],
            'gender' => ['required'],
            'DOB' => ['required','date'],
            'date_of_employeement' => ['required','date'],
            'date_of_employeement_at_probational_unit' => ['required','date'],
            'basic_salary' => ['required'],
            'Incriment_date' => ['required','date'],
            'incriment_value' => ['required'],
            'designation' => ['required'],
            'grade' => ['required'],
            'working_divitional_secretariat' => ['required'],
            'working_police_divition' => ['required'],
            'NIC_no' => ['required'],
            'pension_no' => ['required'],
            'address' => ['required'],

        ]);
        try{
            $Probation_unit_employee=new Probation_unit_employee();
            $Probation_unit_employee->Probation_unit_id=Auth::user()->probationUnitid;
            $Probation_unit_employee->full_name=$request->name;
            $Probation_unit_employee->address=$request->address;
            $Probation_unit_employee->designation=$request->designation;
            $Probation_unit_employee->grade=$request->grade;
            $Probation_unit_employee->tp_no=$request->contact_no;
            $Probation_unit_employee->gender=$request->gender;
            $Probation_unit_employee->NIC_no=$request->NIC_no;
            $Probation_unit_employee->date_of_employeement_at_probational_unit=$request->date_of_employeement_at_probational_unit;
            $Probation_unit_employee->working_divitional_secretariat=$request->working_divitional_secretariat;
            $Probation_unit_employee->working_police_divition=$request->working_police_divition;
            $Probation_unit_employee->working_equipment=$request->working_equipment;
            $Probation_unit_employee->DOB=$request->DOB;
            $Probation_unit_employee->email=$request->email;
            $Probation_unit_employee->date_of_employeement=$request->date_of_employeement;
            $Probation_unit_employee->pension_no=$request->pension_no;
            $Probation_unit_employee->basic_salary=$request->basic_salary;
            $Probation_unit_employee->Incriment_date=$request->Incriment_date;
            $Probation_unit_employee->incriment_value=$request->incriment_value;
            $Probation_unit_employee->Education_qualifications=$request->Education_qualifications;
            $Probation_unit_employee->other_qualification=$request->other_qualification;
            $Probation_unit_employee->courses_falloed_by_the_institute=$request->courses_falloed_by_the_institute;
            $Probation_unit_employee->courses_hope_to_fallow=$request->courses_hope_to_fallow;
            $save=$Probation_unit_employee->save();

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
            'contact_no' => ['required','regex:/^(?:7|0|(?:\+94))[0-9]{9,10}$/'],
            'email' => ['required','email'],
            'gender' => ['required'],
            'DOB' => ['required','date'],
            'date_of_employeement' => ['required','date'],
            'date_of_employeement_at_probational_unit' => ['required','date'],
            'basic_salary' => ['required'],
            'Incriment_date' => ['required','date'],
            'incriment_value' => ['required'],
            'designation' => ['required'],
            'grade' => ['required'],
            'working_divitional_secretariat' => ['required'],
            'working_police_divition' => ['required'],
            'NIC_no' => ['required'],
            'pension_no' => ['required'],
            'address' => ['required'],

        ]);
        try{

            $save=Probation_unit_employee::where('employee_id',$request->id)
            ->update(
                [
                    'full_name' => $request->name,
                    'address' => $request->address,
                    'designation' => $request->designation,
                    'grade' => $request->grade,
                    'tp_no' => $request->contact_no,
                    'gender' => $request->gender,
                    'NIC_no' => $request->NIC_no,
                    'date_of_employeement_at_probational_unit' => $request->date_of_employeement_at_probational_unit,
                    'working_divitional_secretariat' => $request->working_divitional_secretariat,
                    'working_police_divition' => $request->working_police_divition,
                    'working_equipment' => $request->working_equipment,
                    'DOB' => $request->DOB,
                    'email' => $request->email,
                    'date_of_employeement' => $request->date_of_employeement,
                    'pension_no' => $request->pension_no,
                    'basic_salary' => $request->basic_salary,
                    'Incriment_date' => $request->Incriment_date,
                    'incriment_value' => $request->incriment_value,
                    'Education_qualifications' => $request->Education_qualifications,
                    'other_qualification' => $request->other_qualification,
                    'courses_falloed_by_the_institute' => $request->courses_falloed_by_the_institute,
                    'courses_hope_to_fallow' => $request->courses_hope_to_fallow,
                ]);
            if($save){
                $responseBody = $this->responseBody(true, "Probation_unit_employee", "Updated",'data saved');

            }
        }
        catch(Exception $exception){
            $responseBody = $this->responseBody(false, "Probation_unit_employee", "error", $exception->getMessage());

        }
        return response()->json(["data" => $responseBody]);

    }


    public function loadpoliceDevition($id){
        try {
            $Police_division =Police_division::where('divisionalSecretariatID',$id)->get();

            return $this->responseBody(true, "loadpoliceDevition", "found", $Police_division);
        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loadpoliceDevition", "error", $exception->getMessage());
        }
    }

    public function loadProbationUnitEmployee($id){
        try {
                $Probation_unit_employee=Probation_unit_employee::where('employee_id',$id)->first();
                return $this->responseBody(true, "loadProbationUnitEmployee", "found",$Probation_unit_employee );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loadProbationUnitEmployee", "error", $exception->getMessage());
        }
    }

}