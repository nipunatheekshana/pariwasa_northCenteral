<?php

namespace App\Http\Controllers;

use App\Http\common\commonFeatures;
use App\Models\Probation_center;
use App\Models\Probation_unit;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    use commonFeatures;

    public function saveProbationUnitUser(Request $request){
        $validatedData= $request->validate([
            'name' => ['required'],
            'email' => ['required','email'],
            'password' => ['required','confirmed','min:6'],

        ]);
        try{
            $User=new  User();
            $User->name=$request->name;
            $User->email=$request->email;
            $User->role='probationUnitUser';
            $User->probationUnitid=$request->probationUnitid;
            $User->password= Hash::make($request->password);
            $save=$User->save();

            if($save){
                $responseBody = $this->responseBody(true, "saveProbationUnitUser", "saved",'data saved');

            }
        }
        catch(Exception $exception){
            $responseBody = $this->responseBody(false, "saveProbationUnitUser", "error", $exception->getMessage());

        }
        return response()->json(["data" => $responseBody]);

    }

    public function loadProbationUnits(){
        try {
            $Probation_unit =Probation_unit::all('Probation_unit_id','name');

            return $this->responseBody(true, "loadProbationUnits", "found", $Probation_unit);
        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loadProbationUnits", "error", $exception->getMessage());
        }
    }
    public function loadProbationUnitUser($id){
        try {
                $User=User::where('id',$id)->first();
                return $this->responseBody(true, "loadProbationUnitUser", "found",$User );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loadProbationUnitUser", "error", $exception->getMessage());
        }
    }
    public function loadProbationCenters(){
        try {
            $Probation_center =Probation_center::where('Probation_unit_id',Auth::user()->probationUnitid)->get();

            return $this->responseBody(true, "loadProbationCenters", "found", $Probation_center);
        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loadProbationCenters", "error", $exception->getMessage());
        }
    }
    public function saveProbationCenterUser(Request $request){
        $validatedData= $request->validate([
            'name' => ['required'],
            'email' => ['required','email'],
            'password' => ['required','confirmed','min:6'],

        ]);
        try{
            $User=new  User();
            $User->name=$request->name;
            $User->email=$request->email;
            $User->role='probationCenterUser';
            $User->probationCenterId=$request->probationCenterid;
            $User->password= Hash::make($request->password);
            $save=$User->save();

            if($save){
                $responseBody = $this->responseBody(true, "saveProbationCenterUser", "saved",'data saved');

            }
        }
        catch(Exception $exception){
            $responseBody = $this->responseBody(false, "saveProbationCenterUser", "error", $exception->getMessage());

        }
        return response()->json(["data" => $responseBody]);

    }
    public function loadProbationCenterUser($id){
        try {
                $User=User::where('id',$id)->first();
                return $this->responseBody(true, "loadProbationCenterUser", "found",$User );

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loadProbationCenterUser", "error", $exception->getMessage());
        }
    }
}
