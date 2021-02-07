<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\portal;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class portalController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function login(){
        if(Session::get('user_session')){
           return redirect(url('portal/dashboard'));
        }else{
            return view('portal.login');
        }

    }

    public function register(){
        if(Session::get('user_session')){
            return redirect(url('portal/dashboard'));
         }else{
             return view('portal.register');
         }
    }
    public function authenticate(Request $re){
       $portal = Portal::where('email',$re->email)->where('password',$re->password)->get()->toArray();
    //    $arr = Crypt::encryptString($re->password);
    //    $arr = Crypt::decryptString($arr);
       if($portal){
           if($portal[0]['status'] == 1){
               $re->session()->put('user_session',$portal[0]['id']);
               $arr = array('status'=>true,'reload'=>url('portal/dashboard'));
           }else{
            $arr = array('status'=>false,'message'=>'Please contect to admin you dont have permission to login','reload'=>url('portal/login'));
           }
       }else{
        $arr = array('status'=>false,'message'=>'Invalid email and password','reload'=>url('portal/login'));
       }
       echo json_encode($arr);
    }
    public function addUsers(Request $re){
        // print_r($re->all());
         $validator = Validator::make($re->all(), [
             'name' => 'required','mobile_no'=>'required','email'=>'required','password'=>'required'
         ]);
         if ($validator->fails()) {
             $arr = array('status'=>false,'message'=>$validator->errors()->all(),);
         }else{
             $add = new Portal();
             $is_exists = Portal::where('email','$re->email')->get()->toArray();
             if(Empty($is_exists)){
                $add->name = $re->name;
                $add->email = $re->email;
                $add->mobile_no = $re->mobile_no;
                // $add->password = Crypt::encryptString($re->password);
                $add->password = $re->password;
                $add->status = 1;
                $add->save();
                $arr = array('status'=>true,'reload'=>url('portal/dashboard'));
             }else{
                $arr = array('status'=>false,'message'=>'email already exists');
             }

         }
        echo json_encode($arr);
     }
}
