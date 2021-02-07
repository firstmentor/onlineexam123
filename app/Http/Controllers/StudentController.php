<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Examination;
use App\Models\student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    //
    public function login(){
        if(Session::get('student_session')){
           return redirect(url('student/dashboard'));
        }else{
            return view('student.login');
        }
    }
    public function authenticate_student(Request $re){
        $student_email = Student::where('email',$re->email)->first();
        if($student_email){
            if(Hash::check($re->password,$student_email->password) && ($student_email->email == $re->email)){
                // echo "thid id1";

                      if($student_email['status'] == 1){
                      $re->session()->put('student_session',$student_email['id']);
                          $arr = array('status'=>true,'reload'=>url('student/dashboard'));
                      }else{
                      $arr = array('status'=>false,'message'=>'Your account deactivate','reload'=>url('/'));
                      }

             }else{
                $arr = array('status'=>false,'message'=>'Invalid email and password','reload'=>url('/'));
             }

        }else{
            $arr = array('status'=>false,'message'=>'Invalid email and password','reload'=>url('/'));
        }
        echo json_encode($arr);
     }
     public function Registration(Request $re){
        // print_r($re->all());
         $validator = Validator::make($re->all(), [
             'name' => ['required', 'string', 'max:255'],
             'email'=>['required','email', 'max:255', 'unique:users'],
             'mobile_no'=>['required','regex:/^([0-9\s\-\+\(\)]*)$/','digits:10'],
             'password'=>['required', 'string', 'min:8', 'confirmed'],
             'date_of_birth'=>'required',
             'exam'=>'required'
         ]);
         if ($validator->fails()) {
             $arr = array('status'=>false,'message'=>$validator->errors()->all());
         }else{
             $add = new Student();
             $add->name = $re->name;
             $add->email = $re->email;
             $add->mobile_no = $re->mobile_no;
            // $add->password = encrypt($re->password);
             $add->password = Hash::make($re->password);
             $add->dob = $re->date_of_birth;
             $add->exam = $re->exam;
             $add->status = 1;
             $add->save();
             $arr = array('status'=>true,'reload'=>url('/'));
         }
         echo json_encode($arr);
        }
}
