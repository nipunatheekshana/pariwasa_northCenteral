<?php

namespace App\Http\Controllers;

use App\Http\common\commonFeatures;
use App\Models\probationcenter_catagory;
use Exception;
use Illuminate\Http\Request;

class probationCenterCatagoryController extends Controller
{
    use commonFeatures;
    public function save(Request $request){
        $validatedData= $request->validate([
            'Category' => ['required'],
        ]);
        try {
            $probationcenter_catagory =new probationcenter_catagory();
            $probationcenter_catagory->category=$request->Category;
            $save=$probationcenter_catagory->save();

            if($save){
                return $this->responseBody(true, "probationcenter_catagory", "save", "");
            }
            else{
            return $this->responseBody(false, "probationcenter_catagory", "error", null);

            }


        }
         catch (Exception $exception) {
            return $this->responseBody(false, "Vendor", "error", $exception->getMessage());
        }
    }
    public function update(Request $request){
        $validatedData= $request->validate([
            'Category' => ['required'],
        ]);
        try {
            $probationcenter_catagory =probationcenter_catagory::Find($request->id);
            $probationcenter_catagory->category=$request->Category;
            $save=$probationcenter_catagory->save();

            if($save){
                return $this->responseBody(true, "probationcenter_catagory", "save", "");
            }
            else{
            return $this->responseBody(false, "probationcenter_catagory", "error", null);

            }


        }
         catch (Exception $exception) {
            return $this->responseBody(false, "Vendor", "error", $exception->getMessage());
        }
    }
    public function loadcatagory(){
        try {
                $probationcenter_catagory=probationcenter_catagory::all();
                return $this->responseBody(true, "probationcenter_catagory", "found",$probationcenter_catagory );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "probationcenter_catagory", "error", $exception->getMessage());
        }
    }
    public function loadcatagoryToid($id){
        try {
                $probationcenter_catagory=probationcenter_catagory::where('id',$id)->first();
                return $this->responseBody(true, "editcatagory", "found",$probationcenter_catagory );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "editcatagory", "error", $exception->getMessage());
        }
    }
    public function delete($id){
        try {
                $probationcenter_catagory=probationcenter_catagory::find($id)->delete();
                return $this->responseBody(true, "probationcenter_catagory", "Deleted",null );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "probationcenter_catagory", "error", $exception->getMessage());
        }
    }
}
