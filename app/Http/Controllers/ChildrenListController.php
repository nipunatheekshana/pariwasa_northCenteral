<?php

namespace App\Http\Controllers;

use App\Http\common\commonFeatures;
use App\Models\Child;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChildrenListController extends Controller
{
    use commonFeatures;
    public function loadChildren(){
        try {
                $Children = Child::where('probation_center_id',Auth::user()->probationCenterId)->get();
            return $this->responseBody(true, "loadChildren", "found",$Children );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loadChildren", "error", $exception->getMessage());
        }
    }
    public function delete($id){
        try {
                $image=Child::where('id',$id)->first()->image;
                if(file_exists($image)){
                    unlink($image);
                }

                $Child=Child::where('id',$id)->delete();
                return $this->responseBody(true, "Child", "Deleted",null );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "Child", "error", $exception->getMessage());
        }
    }
}
