<?php

namespace App\Http\Controllers;

use App\Models\Portal;
use App\Models\student;
use App\Models\category;
use App\Models\results;
use App\Models\Examination;
use Illuminate\Http\Request;
use App\Models\Exam_question;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Arr;

class AdminController extends Controller
{
    //
    Public function index(){
        return view('admin.dashboard');
    }
    public function category(){
        $data['category'] = Category::orderBy('id','desc')->get()->toArray();
        return view('admin.category',$data);
    }
    public function add_category(Request $re){
       // print_r($re->all());
        $validator = Validator::make($re->all(), [
            'cat_name' => 'required'
        ]);
        if ($validator->fails()) {
            $arr = array('status'=>false,'message'=>$validator->errors()->all(),);
        }else{
            $add = new Category();
            $add->name = $re->cat_name;
            $add->status = 1;
            $add->save();
            $arr = array('status'=>true,'reload'=>url('/admin/category'));
        }
        echo json_encode($arr);
    }
    public function edit_category($id){
    //    $data = Category::where('id',$id)->get()->first();
    //   // echo $data;
    //    return view('admin.edit_category',['data',$data]);
    $data = Category::find($id);
    return view('admin.edit_category',['data'=>$data]);
    }
    public function update_category(Request $re){

        $data = Category::find($re->id);
        $data->name = $re->cat_name;
        $data->update();
        $arr = array('status'=>true,'reload'=>url('/admin/category'));
     echo json_encode($arr);
    }
    public function category_status($id){
        $category_data = Category::where('id',$id)->get()->first();
        if($category_data->status == 1){
            $category_data->status = 0;
        }else{
            $category_data->status = 1;
        }
        $category_data->update();

    }
    public function delete_category($id,Request $req){
        $data = Category::find($id);
        $data->delete();
        $req->session()->flash('status','Deleted Successfully');
        return redirect(url('/admin/category'));
    }
    public function exam(){
        //  $data['exams'] = Examination::select('examinations.*','categories.name as cat_name')
        //  ->orderBy('id','desc')->join('categories','examinations.category', '=','categories.id')->get()->toArray();
        $data['category'] = Category::where('status',1)->orderBy('id','desc')->get()->toArray();
        $data['exams'] = Examination::orderBy('id','desc')->get()->toArray();
       //    return $data['category'];
       return view('admin.exam',['category'=>$data['category'],'exams'=>$data['exams']]);
    }
    public function add_exam(Request $re){
        // print_r($re->all());
         $validator = Validator::make($re->all(), [
             'exam_title' => 'required','exam_date'=>'required','exam_category'=>'required'
         ]);
         if ($validator->fails()) {
             $arr = array('status'=>false,'message'=>$validator->errors()->all(),);
         }else{
             $add = new Examination();
             $add->title = $re->exam_title;
             $add->category = $re->exam_category;
             $add->exam_date = $re->exam_date;
             $add->status = 1;
             $add->save();
             $arr = array('status'=>true,'reload'=>url('/manage_exams'));
         }
         echo json_encode($arr);
     }
     public function exam_status($id){
        $exam_data = Examination::where('id',$id)->get()->first();
          if($exam_data->status == 1){
            $exam_data->status = 0;
          }else{
            $exam_data->status = 1;
          }
           $exam_data->update();
    }
        public function edit_exam($id){
            $data = Examination::find($id);
            $category = Category::where('status',1)->orderBy('id','desc')->get()->toArray();
            return view('admin.edit_exam',['category'=>$category,'data'=>$data]);
        }
        public function update_exam(Request $re){
            $data = Examination::find($re->id);
            $data->title = $re->exam_title;
            $data->category = $re->exam_category;
            $data->exam_date = $re->exam_date;
            $data->update();
            $arr = array('status'=>true,'reload'=>url('/manage_exams'));
            echo json_encode($arr);
        }
        public function delete_exam($id,Request $req){
            $data = Examination::find($id);
            $data->delete();
            $req->session()->flash('status','Deleted Successfully');
            return redirect(url('manage_exams'));
        }
        public function student(){
            //  $data['exams'] = Examination::select('examinations.*','categories.name as cat_name')
            //  ->orderBy('id','desc')->join('categories','examinations.category', '=','categories.id')->get()->toArray();
          //  $data['category'] = Category::where('status',1)->orderBy('id','desc')->get()->toArray();
            $data['exams'] = Examination::where('status',1)->orderBy('id','desc')->get()->toArray();
            $data['students'] = student::select('students.*','examinations.title as exam','examinations.exam_date as exam_date')->orderBy('id','desc')
            ->join('examinations','students.exam','=','examinations.id')->
            get()->toArray();
               ///return $data['students'];
         return view('admin.student',$data);
        }
        public function add_student(Request $re){
            // print_r($re->all());
             $validator = Validator::make($re->all(), [
                 'name' => 'required','email'=>'required','mobile_no'=>'required','password'=>'required','dob'=>'required','exam'=>'required'
             ]);
             if ($validator->fails()) {
                 $arr = array('status'=>false,'message'=>$validator->errors()->all(),);
             }else{
                 $add = new Student();
                 $add->name = $re->name;
                 $add->email = $re->email;
                 $add->mobile_no = $re->mobile_no;
                // $add->password = encrypt($re->password);
                 $add->password = Hash::make($re->password);
                 $add->dob = $re->dob;
                 $add->exam = $re->exam;
                 $add->status = 1;
                 $add->save();
                 $arr = array('status'=>true,'reload'=>url('/students'));
             }
             echo json_encode($arr);
         }
         public function student_status($id){
            $student_data = Student::find($id);
          // echo json_encode($student_data);
            if($student_data->status == 1){
                $status = 0;
            }else{
                $status = 1;
            }
             $student_data->status = $status;
             $student_data->update();
            // $arr = array('status'=>true,'reload'=>url('/category'));
            // echo json_encode($arr);
           // echo json_encode($id);
          // return $id;
        }
            public function edit_student($id){
                $data = Student::find($id);
                $decrypted= $data->password;
                try {
                    $decrypted = Crypt::decryptString($data->password);
                } catch (DecryptException $e) {
                    //
                }

                // echo json_encode($decrypted);
                $exams = Examination::where('status',1)->orderBy('id','desc')->get()->toArray();
                return view('admin.edit_student',['exams'=>$exams,'data'=>$data]);
            }
            public function update_student(Request $re){
                $data = Student::find($re->id);
                $data->name = $re->name;
                $data->email = $re->email;
                $data->mobile_no = $re->mobile_no;
                if($re->password != ''){
                    $data->password = $re->password;
                }
                $data->dob = $re->dob;
                $data->exam = $re->exam;
                $data->status = 1;
                $data->update();
                $arr = array('status'=>true,'reload'=>url('/students'));
                echo json_encode($arr);
            }
            public function delete_student($id,Request $req){
                $data = Student::find($id);
                $data->delete();
                $req->session()->flash('status','Deleted Successfully');
                return redirect(url('students'));
            }
            public function portal(){
                $data['portals'] = Portal::orderBy('id','desc')->get()->toArray();
                return view('admin.portal',$data);
            }
            public function add_portal(Request $re){
                // print_r($re->all());
                 $validator = Validator::make($re->all(), [
                     'name' => 'required','mobile_no'=>'required','email'=>'required','password'=>'required'
                 ]);
                 if ($validator->fails()) {
                     $arr = array('status'=>false,'message'=>$validator->errors()->all(),);
                 }else{
                     $add = new Portal();
                     $add->name = $re->name;
                     $add->email = $re->email;
                     $add->mobile_no = $re->mobile_no;
                     $add->password = Crypt::encryptString($re->password);
                     $add->status = 1;
                     $add->save();
                     $arr = array('status'=>true,'reload'=>url('/admin/portal'));
                 }
                 echo json_encode($arr);
             }
             public function portal_status($id){
                $portal_data = Portal::where('id',$id)->get()->first();
                if($portal_data->status == 1){
                    $portal_data->status = 0;
                }else{
                    $portal_data->status = 1;
                }
                $portal_data->update();

            }
            public function edit_portal($id){
                //    $data = Category::where('id',$id)->get()->first();
                //   // echo $data;
                //    return view('admin.edit_category',['data',$data]);
                $data = Portal::find($id);
                return view('admin.edit_portal',['data'=>$data]);
                }
                public function update_portal(Request $re){
                    $data = Portal::find($re->id);
                    $data->name = $re->name;
                    $data->email = $re->email;
                    $data->mobile_no = $re->mobile_no;
                    $data->update();
                    $arr = array('status'=>true,'reload'=>url('admin/portal'));
                    echo json_encode($arr);
                }
                public function delete_portal($id,Request $req){
                    $data = Portal::find($id);
                    $data->delete();
                    $req->session()->flash('status','Deleted Successfully');
                    return redirect(url('/admin/portal'));
                }
                public function Add_question($id){
                    $data['questions'] = Exam_question::where('exam_id',$id)->get()->toArray();
                    // return $data['questions'];
                    // die();
                    return view('admin.add_ques',$data);
                }
                public function add_new_question(Request $re){
                     $validators = Validator::make($re->all(),['question'=>'required','option1'=>'required','option2'=>'required',
                     'option3'=>'required','option4'=>'required','answer'=>'required']);
                     if($validators->fails()){
                          $arr = array('status'=>false,'message'=>$validators->errors()->all());
                     }else{
                        $add = new Exam_question();
                        $add->exam_id = $re->exam_id;
                        $add->question = $re->question;
                        $add->options = json_encode(array('option1'=>$re->option1,'option2'=>$re->option2,
                        'option3'=>$re->option3,'option4'=>$re->option4));
                        $add->answer = $re->answer;
                        $add->status = 1;
                        $add->save();
                        $arr = array('status'=>true,'reload'=>url('/add_question/'.$re->exam_id));
                     }
                     echo json_encode($arr);
                }
                public function question_status($id){
                    $question_data = Exam_question::where('id',$id)->get()->first();
                    if($question_data->status == 1){
                        $question_data->status = 0;
                    }else{
                        $question_data->status = 1;
                    }
                    $question_data->update();

                }
                public function edit_question($id){
                    //    $data = Category::where('id',$id)->get()->first();
                    //   // echo $data;
                    //    return view('admin.edit_category',['data',$data]);
                    $data = Exam_question::find($id);
                    // return $data['options']->option1;
                    // die();
                    return view('admin.edit_question',['data'=>$data]);
                    }
                    public function update_question(Request $re){
                        $data = Exam_question::find($re->id);
                        $data->question = $re->question;
                        $data->answer = $re->answer;
                        $data->options = json_encode(array('option1'=>$re->option1,'option2'=>$re->option2,
                        'option3'=>$re->option3,'option4'=>$re->option4));
                        $data->update();
                        $arr = array('status'=>true,'reload'=>url('add_question/'.$data->exam_id));
                        echo json_encode($arr);
                    }
                    public function delete_question($id,Request $req){
                        $data = Exam_question::find($id);
                        $data->delete();
                        $req->session()->flash('status','Deleted Successfully');
                        return redirect(url('add_question/'.$data->exam_id));
                    }
                    public function result(){
                        $datas = results::all();
                        return view('admin.result',['datas'=>$datas]);
                    }
}
