<?php

namespace App\Http\Controllers;

use App\Models\Exam_question;
use App\Models\student;
use App\Models\results;
use App\Models\Examination;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class StudentOperation extends Controller
{
    //
    public function dashboard(){
        
        $session_data = Session::get('student_session');
        if($session_data){
           // $exam_data = student::where('id',Session::get('student_session'))->get()->toArray();
            $exam_data = Student::select('students.*','examinations.exam_date','examinations.title','examinations.category')->join('examinations','students.exam','=','examinations.id')
            ->where('students.id',Session::get('student_session'))->get()->toArray();
          // return print_r($exam_data);
            $exam_result = Results::where('user_id',Session::get('student_session'))->get()->first();

           // dd($exam_result);
          // return print_r($exam_data);
            return view('student.dashboard',['exam_data'=>$exam_data,'exam_result'=>$exam_result]);
        }else{
            return view('student.login');
        }
        // echo "<pre>";
        // print_r($exam_data);
        // foreach($exam_data as $exam){
        //     if($exam->status == '1'){
        //         echo $exam;
        //     }
        // }
    }
    public function exam(){
        if(!Session::get('student_session'))
    	{
            return redirect(url('/'));
            
    	}
        $exam = Student::select('students.*','examinations.exam_date','examinations.title')->join('examinations','students.exam','=','examinations.id')
        ->where('students.id',Session::get('student_session'))->get()->first();
        $exam_data = Student::select('students.*','examinations.exam_date','examinations.title','examinations.category')->join('examinations','students.exam','=','examinations.id')
        ->where('students.id',Session::get('student_session'))->get()->toArray();
        $exam_done = results::where('exam_id',$exam->exam)->where('user_id',Session::get('student_session'))->get()->first();
         //return $exam_done->wrong;
         if($exam_done)
              $exam_total_ques = $exam_done['correct'] + $exam_done['wrong'];
            else
            {
                $exam_total_ques=0;
            }
        // return $exam_total_ques;
        // die();

        return view('student.exam',['exam'=>$exam,'exam_done'=>$exam_done,'exam_data'=>$exam_data,'ques'=> $exam_total_ques]);
    }

    public function join_exam($id){
        if(!Session::get('student_session'))
    	{
            return redirect(url('/'));
            
    	}

        $exam_ques['exam_data'] = Student::select('students.*','examinations.exam_date','examinations.title','examinations.category')->join('examinations','students.exam','=','examinations.id')
        ->where('students.id',Session::get('student_session'))->get()->toArray();
        $exam_ques['count_question'] = Exam_question::where('exam_id',$id)->count();
        $exam_ques['question'] = Exam_question::where('exam_id',$id)->get()->toArray();
        $exam_ques['exam_info'] = Examination::where('id',$id)->get()->toArray();
        
        $create_result = new Results;
        $create_result->exam_id = $id;
        $create_result->user_id = Session::get('student_session');
        $create_result->status = "started";
        $create_result->save();
        return view('student.exampaper',$exam_ques);
        // $URL_STUDENT_TAKE_EXAM = 'join_exam';
        // return '<a onClick="showInstructions(\''.$URL_STUDENT_TAKE_EXAM.'\')" href="javascript:void(0);"></a>';
    }

    public function submitExam(Request $re){
        if(!Session::get('student_session'))
    	{
            return redirect(url('/'));
            
    	}
       // dd($re->all());
       $data = $re->all();
       $correct = 0;
       $wrong = 0;
       $result = array();
       for ($i=1; $i <= $re->index; $i++) {
           if(isset($data['question'.$i])){
              $question = Exam_question::where('id',$data['question'.$i])->get()->first();
              if($question->answer == $data['ans'.$i]){
                  $result[$data['question'.$i]] = 'Yes';
                  $correct++;
              }else{
                    $result[$data['question'.$i]] = 'No';
                    $wrong++;
              }
           }
       }
       $create_result = Results::where('user_id',Session::get('student_session'))->first();
        
       $create_result->correct = $correct;
       $create_result->user_id = Session::get('student_session');
       $create_result->wrong = $wrong;
       $create_result->status = "completed";
       $create_result->result_json = json_encode($result);
       $create_result->save();
     return  redirect(url('show_result/'.$create_result->id));
    }
    public function show_result($id){
        if(!Session::get('student_session'))
    	{
            return redirect(url('/'));
            
    	}
        $data['result'] = Results::where('id',$id)->get()->first();
        $data['student'] = Student::select('students.*','examinations.exam_date','examinations.title')->join('examinations','students.exam','=','examinations.id')
        ->where('students.id',Session::get('student_session'))->get()->first();
        $data['exam_data'] = Student::select('students.*','examinations.exam_date','examinations.title','examinations.category')->join('examinations','students.exam','=','examinations.id')
        ->where('students.id',Session::get('student_session'))->get()->toArray();

      //  echo "<pre>";
      //return print_r($data);
    return view('student.show_result',$data);
    }
    public function logout(Request $re){
        $re->session()->forget('student_session');
        return redirect(url('/'));
    }

}
