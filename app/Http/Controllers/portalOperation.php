<?php

namespace App\Http\Controllers;
use App\Models\Examination;
use App\Models\student;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class portalOperation extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth_portal');
    }

    public function dashboard(){
        dd("hh");
        $session_data = Session::get('user_session');
        if($session_data){
            $exam_data = Examination::where('status','1')->get()->toArray();
            return view('portal.dashboard',['exam_data'=>$exam_data]);
        }else{
            return view('portal.login');
        }
        // echo "<pre>";
        // print_r($exam_data);
        // foreach($exam_data as $exam){
        //     if($exam->status == '1'){
        //         echo $exam;
        //     }
        // }

    }
    public function register_for_exam($id){
        $datas = Examination::where('id',$id)->get()->first();
        $data['title']= $datas->title;
        $data['exam_date'] = $datas->exam_date;
        $data['id'] = $datas->id;
        //return $data;
       return view('portal.registration_form',$data);
    }
    public function registration(Request $re){
        $validator = Validator::make($re->all(), [
            'name' => 'required','mobile_no'=>'required','email'=>'required','password'=>'required','dob'=>'required'
        ]);
        if ($validator->fails()) {
            $arr = array('status'=>false,'message'=>$validator->errors()->all(),);
        }else{
            $add = new Student();

               $add->name = $re->name;
               $add->email = $re->email;
               $add->mobile_no = $re->mobile_no;
               $add->exam = $re->id;
               $add->dob = $re->dob;
               $add->password = Crypt::encryptString($re->password);
               // $add->password = $re->password;
               $add->status = 1;
               $add->save();
               $arr = array('status'=>true,'reload'=>url('receipt_print/'.$add->id));

        }
       echo json_encode($arr);
    }
    public function get_Stu($id){
        $data = Student::where('id',$id)->get()->first();
        $exams = Examination::where('id',$data->exam)->get()->first();
        // $exam['title'] = $exams->title;
        // $exam['exam_date'] = $exams->exam_date;
        return view('portal.print_info',['datas'=>$data,'exam'=>$exams]);
    }
    public function updateForm(){
        $exam = Examination::where('status',1)->orderBy('id','desc')->get()->toArray();
        // print_r($exam);
        // die();
        return view('portal.update_form',['exams'=>$exam]);
    }
    public function studentEditInfo(Request $re){
         $data = Student::where('mobile_no',$re->mobile_no)->where('dob',$re->dob)->where('exam',$re->exam)->get()->first();
        // $password = Crypt::decryptString($data->password);
         return $data;
          die();
         $exams = Examination::where('id',$re->exam)->get()->first();
        //  $exams['title']= $exam->title;
        //  $exams['exam_date'] = $exam->exam_date;

        // die();
      //  $exams['exam'] = $exam->exam;
        // return view('portal.student_info_form',['datas'=>$data,'exam'=>$exams,'pass'=>$password]);
        return view('portal.student_info_form',['datas'=>$data,'exam'=>$exams,'pass' => $data->password]);

    }
    public function update_student_form(Request $re){
        $data = Student::find($re->id);
        $data->name = $re->name;
        $data->email = $re->email;
        $data->mobile_no = $re->mobile_no;
        if($re->password){
            $data->password = Crypt::encryptString($re->password);
        }
        $data->dob = $re->dob;
        $data->exam = $re->exam;
        $data->status = 1;
        $data->update();
        $arr = array('status'=>true,'reload'=>url('portal/edit_form'));
        echo json_encode($arr);
    }
    public function logout(Request $re){
        $re->session()->forget('user_session');
        return redirect(url('portal/sign_in'));
    }
}
