<?php

namespace App\Http\Controllers;

use App\Http\common\commonFeatures;
use App\Models\Police_division;
use App\Models\Probation_unit_employee;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Else_;

class probationUnitEmployeeController extends Controller
{
    use commonFeatures;

    public function save(Request $request){
        $validatedData= $request->validate([
            'name' => ['required'],
            'title' => ['required'],
            'initials' => ['required'],
            'contact_no' => ['required','regex:/^(?:7|0|(?:\+94))[0-9]{9,10}$/'],
            // 'email' => ['email'],
            'gender' => ['required'],
            // 'DOB' => ['date'],
            // 'date_of_employeement' => ['date'],
            // 'date_of_employeement_at_probational_unit' => ['date'],
            // 'basic_salary' => ['required'],
            // 'image' => ['image', 'max:1024'],
            // 'Incriment_date' => ['date'],
            // 'incriment_value' => ['required'],
            // 'designation' => ['required'],
            // 'grade' => ['required'],
            'working_divitional_secretariat' => ['required'],
            'working_police_divition' => ['required'],
            // 'NIC_no' => ['required'],
            // 'pension_no' => ['required'],
            // 'address' => ['required'],

        ]);
        try{
            if($request->has('image')&&$request->has('image')!=null){

                $id=$request->NIC_no;
                $const='User-';
                $imagename =$const.$id; //new image name
                // dd($request->get('logo'));
                $guessExtension = $request->file('image')->guessExtension(); //file extention
                $file = $request->file('image')->storeAs(Auth::user()->probationUnitid.'/users/userImages', $imagename.'.'.$guessExtension,'public_uploads' );
                //build url for the image
                $const_url='uploads/'.Auth::user()->probationUnitid.'/users/userImages/';
                $url=$const_url.$imagename.'.'.$guessExtension;
            }
            else{
                $url=null;
            }
            $Probation_unit_employee=new Probation_unit_employee();
            $Probation_unit_employee->Probation_unit_id=Auth::user()->probationUnitid;
            $Probation_unit_employee->image= $url;
            $Probation_unit_employee->full_name=$request->name;
            $Probation_unit_employee->initials=$request->initials;
            $Probation_unit_employee->title=$request->title;
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
            $Probation_unit_employee->isExecutive=$request->has('isExce');

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
            'title' => ['required'],
            'initials' => ['required'],
            'contact_no' => ['required','regex:/^(?:7|0|(?:\+94))[0-9]{9,10}$/'],
            // 'email' => ['email'],
            'gender' => ['required'],
            // 'DOB' => ['date'],
            // 'date_of_employeement' => ['date'],
            // 'date_of_employeement_at_probational_unit' => ['date'],
            // 'basic_salary' => ['required'],
            // 'image' => ['image', 'max:1024'],
            // 'Incriment_date' => ['date'],
            // 'incriment_value' => ['required'],
            // 'designation' => ['required'],
            // 'grade' => ['required'],
            'working_divitional_secretariat' => ['required'],
            'working_police_divition' => ['required'],
            // 'NIC_no' => ['required'],
            // 'pension_no' => ['required'],
            // 'address' => ['required'],

        ]);
        try{
            if($request->has('image')&&$request->has('image')!=null){

                $id=$request->NIC_no;
                $const='User-';
                $imagename =$const.$id; //new image name
                // dd($request->get('logo'));
                $guessExtension = $request->file('image')->guessExtension(); //file extention
                $file = $request->file('image')->storeAs(Auth::user()->probationUnitid.'/users/userImages', $imagename.'.'.$guessExtension,'public_uploads' );
                //build url for the image
                $const_url='uploads/'.Auth::user()->probationUnitid.'/users/userImages/';
                $url=$const_url.$imagename.'.'.$guessExtension;
            }
            else{
                $url=$request->oldimage;
            }


            $save=Probation_unit_employee::where('employee_id',$request->id)
            ->update(
                [
                    'full_name' => $request->name,
                    'title' => $request->title,
                    'initials' => $request->initials,
                    'image'=> $url,
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
                    'isExecutive'=>$request->has('isExce')
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


    public function loadpoliceDevition(){
        try {
            $Police_divisions =Police_division::all();
            $Police_division_arr = [];

            foreach ($Police_divisions as $Police_division) {
                array_push($Police_division_arr, ["img" => "", "id" => $Police_division['id'], "value" => $Police_division['name']]);
            }

            return $this->responseBody(true, "loadpoliceDevition", "found", $Police_division_arr);
        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loadpoliceDevition", "error", $exception->getMessage());
        }
    }

    public function loadProbationUnitEmployee($id){
        try {
                $Probation_unit_employee=DB::table('probation_unit_employees')
                                            ->join('police_divisions','police_divisions.districtId','=','probation_unit_employees.working_police_divition')
                                            ->where('probation_unit_employees.employee_id','=',$id)
                                            ->select('probation_unit_employees.*','police_divisions.name')
                                            ->first();
                return $this->responseBody(true, "loadProbationUnitEmployee", "found",$Probation_unit_employee );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loadProbationUnitEmployee", "error", $exception->getMessage());
        }
    }

}
