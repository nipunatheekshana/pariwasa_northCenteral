<?php

namespace App\Http\Controllers;

use App\Http\common\commonFeatures;
use App\Models\Grade;
use Exception;
use Illuminate\Http\Request;

class GradesController extends Controller
{
    use commonFeatures;
    public function save(Request $request){
        $validatedData= $request->validate([
            'name' => ['required'],
        ]);
        try {
            $Grade =new Grade();
            $Grade->name=$request->name;
            $save=$Grade->save();

            if($save){
                return $this->responseBody(true, "Grade", "save", "");
            }
            else{
            return $this->responseBody(false, "Grade", "error", null);

            }


        }
         catch (Exception $exception) {
            return $this->responseBody(false, "Vendor", "error", $exception->getMessage());
        }
    }
    public function update(Request $request){
        $validatedData= $request->validate([
            'name' => ['required'],
        ]);
        try {
            $Grade =Grade::Find($request->id);
            $Grade->name=$request->name;
            $save=$Grade->save();

            if($save){
                return $this->responseBody(true, "Grade", "save", "");
            }
            else{
            return $this->responseBody(false, "Grade", "error", null);

            }


        }
         catch (Exception $exception) {
            return $this->responseBody(false, "Vendor", "error", $exception->getMessage());
        }
    }
    public function loadGrade(){
        try {
                $grade=grade::all();
                return $this->responseBody(true, "grade", "found",$grade );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "grade", "error", $exception->getMessage());
        }
    }
    public function loadGradeToid($id){
        try {
                $Grade=Grade::where('id',$id)->first();
                return $this->responseBody(true, "editcatagory", "found",$Grade );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "editcatagory", "error", $exception->getMessage());
        }
    }
    public function delete($id){
        try {
                $grade=grade::find($id)->delete();
                return $this->responseBody(true, "grade", "Deleted",null );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "grade", "error", $exception->getMessage());
        }
    }
}
