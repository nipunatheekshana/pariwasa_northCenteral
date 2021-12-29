<?php

namespace App\Http\Controllers;

use App\Http\common\commonFeatures;
use App\Models\District;
use Exception;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    use commonFeatures;
    public function save(Request $request){
        $validatedData= $request->validate([
            'name' => ['required'],
        ]);
        try {
            $District =new District();
            $District->district=$request->name;
            $save=$District->save();

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
    public function update(Request $request){
        $validatedData= $request->validate([
            'name' => ['required'],
        ]);
        try {
            $District =District::Find($request->id);
            $District->district=$request->name;
            $save=$District->save();

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
    public function loaddistrict(){
        try {
                $District=District::all();
                return $this->responseBody(true, "District", "found",$District );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "District", "error", $exception->getMessage());
        }
    }
    public function loaddistrictToid($id){
        try {
                $Grade=District::where('id',$id)->first();
                return $this->responseBody(true, "loaddistrictToid", "found",$Grade );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loaddistrictToid", "error", $exception->getMessage());
        }
    }
    public function delete($id){
        try {
                $District=District::find($id)->delete();
                return $this->responseBody(true, "District", "Deleted",null );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "District", "error", $exception->getMessage());
        }
    }
}
