<?php

namespace App\Http\Controllers;

use App\Http\common\commonFeatures;
use App\Models\Child;
use App\Models\Education_detail;
use App\Models\ParentDetails;
use App\Models\Probation_center;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChildrenRegisterController extends Controller
{
    use commonFeatures;

    public function save(Request $request){
        $validatedData= $request->validate([
            'name' => ['required'],
            'image' => ['image', 'max:1024'],


        ]);
        try{
            if($request->has('image')&&$request->has('image')!=null){

                $id=bin2hex(openssl_random_pseudo_bytes(5));
                $const='child-';
                $imagename =$const.$id; //new image name
                // dd($request->get('logo'));
                $guessExtension = $request->file('image')->guessExtension(); //file extention
                $probationUnit=Probation_center::where('probation_center_id',Auth::user()->probationCenterId)->first()->Probation_unit_id;
                $file = $request->file('image')->storeAs($probationUnit.'/probationCenters/'.Auth::user()->probationCenterId.'/children/profileImages', $imagename.'.'.$guessExtension,'public_uploads' );
                //build url for the image
                $const_url='uploads/'.$probationUnit.'/probationCenters/'.Auth::user()->probationCenterId.'/children/profileImages/';
                $url=$const_url.$imagename.'.'.$guessExtension;
            }
            else{
                $url=null;
            }
            $Child=new Child();
            $Child->probation_center_id=Auth::user()->probationCenterId;
            $Child->image= $url;
            $Child->full_name=$request->name;
            $Child->DOB=$request->Dob;
            $Child->nationality=$request->nationality;
            $Child->religion=$request->religion;
            $Child->gender=$request->gender;
            $Child->birth_certificate=$request->birth_certificate;
            $Child->helth_status=$request->helth_status;
            $Child->how_entered=$request->how_entered;
            $Child->case_number=$request->case_number;
            $Child->Entered_divition=$request->Entered_divition;
            $Child->court=$request->court;
            $Child->crime_commited=$request->crime_commited;
            $Child->date_entered=$request->date_entered;
            $Child->status_before_enter=$request->status_before_enter;
            $Child->status_after_enter=$request->status_after_entered;
            $Child->disability=$request->disability;
            $Child->hasParents=$request->has('hasParents');
            $Child->hasEducation=$request->has('hasEducation');
            $save=$Child->save();

            if($save && $request->has('hasParents')){

                $parent=new ParentDetails();
                $parent->child_id=$Child->id;
                $parent->mothers_name=$request->mothers_name;
                $parent->mothers_name_initial=$request->mothers_name_initial;
                $parent->mothers_DOB=$request->mothers_DOB;
                $parent->mothers_tp_no=$request->mothers_tp_no;
                $parent->mothers_job=$request->mothers_job;
                $parent->mothers_religion=$request->mothers_religion;
                $parent->mothers_address=$request->mothers_address;
                $parent->mothers_education_qulifications=$request->mothers_education_qulifications;
                $parent->fathers_name=$request->fathers_name;
                $parent->fathers_name_initial=$request->fathers_name_initial;
                $parent->fathers_DOB=$request->fathers_DOB;
                $parent->fathers_tp_no=$request->fathers_tp_no;
                $parent->fathers_job=$request->fathers_job;
                $parent->fathers_address=$request->fathers_address;
                $parent->save();

            }
            if($save && $request->has('hasEducation')){

                $education=new Education_detail();
                $education->child_id=$Child->id;
                $education->school_name=$request->school_name;
                $education->grade=$request->grade;
                $education->skills=$request->skills;
                $education->aesthetics=$request->aesthetics;
                $education->extra_curiculars=$request->extra_curiculars;
                $education->school_subjects=$request->school_subjects;
                $education->school_address=$request->school_address;
                $education->diploma_contactNum=$request->diploma_contactNum;
                $education->diploma_subjects=$request->diploma_subjects;
                $education->diploma_higherEducation=$request->diploma_higherEducation;
                $education->diploma_address=$request->diploma_address;
                $education->uni_contact_num=$request->uni_contact_num;
                $education->uni_subjects=$request->uni_subjects;
                $education->uni_address=$request->uni_address;
                $education->probation_officers_followUp=$request->probation_officers_followUp;
                $education->save();

            }


            if($save){
                $responseBody = $this->responseBody(true, "registerChildren", "saved",'data saved');

            }
        }
        catch(Exception $exception){
            $responseBody = $this->responseBody(false, "registerChildren", "error", $exception->getMessage());

        }
        return response()->json(["data" => $responseBody]);

    }

    public function update(Request $request){
        $validatedData= $request->validate([
            'name' => ['required'],
            'image' => ['image', 'max:1024'],


        ]);
        try{
            if($request->has('image')&&$request->has('image')!=null){

               $removeImage= Child::where('id',$request->id)->first()->image;

                if(file_exists($removeImage)){
                    unlink($removeImage);
                }

                $id=bin2hex(openssl_random_pseudo_bytes(5));
                $const='child-';
                $imagename =$const.$id; //new image name
                // dd($request->get('logo'));
                $guessExtension = $request->file('image')->guessExtension(); //file extention
                $probationUnit=Probation_center::where('probation_center_id',Auth::user()->probationCenterId)->first()->Probation_unit_id;
                $file = $request->file('image')->storeAs($probationUnit.'/probationCenters/'.Auth::user()->probationCenterId.'/children/profileImages', $imagename.'.'.$guessExtension,'public_uploads' );
                //build url for the image
                $const_url='uploads/'.$probationUnit.'/probationCenters/'.Auth::user()->probationCenterId.'/children/profileImages/';
                $url=$const_url.$imagename.'.'.$guessExtension;
            }
            else{
                $url=$request->oldimage;
            }


            $save=Child::where('id',$request->id)
            ->update(
                [
                    'image'=> $url,
                    'full_name'=>$request->name,
                    'DOB'=>$request->Dob,
                    'nationality'=>$request->nationality,
                    'religion'=>$request->religion,
                    'gender'=>$request->gender,
                    'birth_certificate'=>$request->birth_certificate,
                    'helth_status'=>$request->helth_status,
                    'how_entered'=>$request->how_entered,
                    'case_number'=>$request->case_number,
                    'Entered_divition'=>$request->Entered_divition,
                    'court'=>$request->court,
                    'crime_commited'=>$request->crime_commited,
                    'date_entered'=>$request->date_entered,
                    'status_before_enter'=>$request->status_before_enter,
                    'status_after_enter'=>$request->status_after_entered,
                    'disability'=>$request->disability,
                    'hasParents'=>$request->has('hasParents'),
                    'hasEducation'=>$request->has('hasEducation')
                ]);
                
                if($save && $request->has('hasParents')){
                    $parent=ParentDetails::updateOrCreate(['child_id'=>$request->id],
                                                            [
                                                                'mothers_name'=>$request->mothers_name,
                                                                'mothers_name_initial'=>$request->mothers_name_initial,
                                                                'mothers_DOB'=>$request->mothers_DOB,
                                                                'mothers_tp_no'=>$request->mothers_tp_no,
                                                                'mothers_job'=>$request->mothers_job,
                                                                'mothers_religion'=>$request->mothers_religion,
                                                                'mothers_address'=>$request->mothers_address,
                                                                'mothers_education_qulifications'=>$request->mothers_education_qulifications,
                                                                'fathers_name'=>$request->fathers_name,
                                                                'fathers_name_initial'=>$request->fathers_name_initial,
                                                                'fathers_DOB'=>$request->fathers_DOB,
                                                                'fathers_tp_no'=>$request->fathers_tp_no,
                                                                'fathers_job'=>$request->fathers_job,
                                                                'fathers_address'=>$request->fathers_address,
                                                            ]);
                }

                if($save && $request->has('hasEducation')){
                    $education=Education_detail::updateOrCreate(['child_id'=>$request->id],
                                                            [
                                                                'school_name'=>$request->school_name,
                                                                'grade'=>$request->grade,
                                                                'skills'=>$request->skills,
                                                                'aesthetics'=>$request->aesthetics,
                                                                'extra_curiculars'=>$request->extra_curiculars,
                                                                'school_subjects'=>$request->school_subjects,
                                                                'school_address'=>$request->school_address,
                                                                'diploma_contactNum'=>$request->diploma_contactNum,
                                                                'diploma_subjects'=>$request->diploma_subjects,
                                                                'diploma_higherEducation'=>$request->diploma_higherEducation,
                                                                'diploma_address'=>$request->diploma_address,
                                                                'uni_contact_num'=>$request->uni_contact_num,
                                                                'uni_subjects'=>$request->uni_subjects,
                                                                'uni_address'=>$request->uni_address,
                                                                'probation_officers_followUp'=>$request->probation_officers_followUp,

                                                            ]);
                }


            if($save){
                $responseBody = $this->responseBody(true, "Probation_unit_employee", "Updated",'data saved');

            }
        }
        catch(Exception $exception){
            $responseBody = $this->responseBody(false, "Probation_unit_employee", "error", $exception->getMessage());

        }
        return response()->json(["data" => $responseBody]);

    }

    public function loadChild($id){
        try {

            $parentDetails=null;
            $education=null;

                $child=DB::table('children')
                            ->where('id','=',$id)
                            ->first();

                if( $child->hasParents){
                    $parentDetails=ParentDetails::where('child_id',$child->id)->first();
                }
               if( $child->hasEducation){
                    $education=Education_detail::where('child_id',$child->id)->first();
               }
                return $this->responseBody(true, "loadChild", "found",['child'=>$child,'parentDetails'=>$parentDetails,'education'=>$education ]);

        }
         catch (Exception $exception) {
            return $this->responseBody(false, "loadChild", "error", $exception->getMessage());
        }
    }
}
