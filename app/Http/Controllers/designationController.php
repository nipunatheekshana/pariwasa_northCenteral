<?php

namespace App\Http\Controllers;

use App\Http\common\commonFeatures;
use App\Models\Designation;
use Exception;
use Illuminate\Http\Request;

class designationController extends Controller
{
    use commonFeatures;
    public function save(Request $request){
        $validatedData= $request->validate([
            'name' => ['required'],
        ]);
        try {
            $Designation =new Designation();
            $Designation->name=$request->name;
            $save=$Designation->save();

            if($save){
                return $this->responseBody(true, "Designation", "save", "");
            }
            else{
            return $this->responseBody(false, "Designation", "error", null);

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
            $Designation =Designation::Find($request->id);
            $Designation->name=$request->name;
            $save=$Designation->save();

            if($save){
                return $this->responseBody(true, "Designation", "save", "");
            }
            else{
            return $this->responseBody(false, "Designation", "error", null);

            }


        }
         catch (Exception $exception) {
            return $this->responseBody(false, "Vendor", "error", $exception->getMessage());
        }
    }
    public function loaddesignation(){
        try {
                $Designation=Designation::all();
                return $this->responseBody(true, "loaddesignation", "found",$Designation );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loaddesignation", "error", $exception->getMessage());
        }
    }
    public function loaddesignationToid($id){
        try {
                $Designation=Designation::where('id',$id)->first();
                return $this->responseBody(true, "loaddesignationToid", "found",$Designation );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loaddesignationToid", "error", $exception->getMessage());
        }
    }
    public function delete($id){
        try {
                $Designation=Designation::find($id)->delete();
                return $this->responseBody(true, "Designation", "Deleted",null );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "Designation", "error", $exception->getMessage());
        }
    }
}
