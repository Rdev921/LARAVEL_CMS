<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index(){
        return view('admin.login');
    }
    public function makeLogin(Request $request){
       $validator = Validator::make($request->all(),[
           'username'=>'required','string',
           'password'=>'required'
       ]);
       if($validator->fails()){
           return back()
               ->withErrors($validator)
               ->withInput();
   }
//*******************Encrypt password*************
        $data = array(
            'username' =>   $request->username,
            'password' =>   $request->password,
        );
        if($data){
            return redirect('dashboard');
            // echo 'yes';
        }else{
            return back()->withErrors(['message'=>'Invalid username and password']);
        }

//        ************get admin***************
    //    $admin = Admin::where('username',$request->username)->where('password',$request->password)
    //        ->get()->toArray();
    //    if($admin){
    //        return redirect('dashboard');
    //    }else{
    //        return back()->withErrors(['message'=>'Invalid username and password']);
    //    }

        }

        public function dashboard(){
        return view('admin.dashboard');
        
        }
        public function logout(){
            Auth::logout();
            return redirect()->route('admin.logout');
        }
}
