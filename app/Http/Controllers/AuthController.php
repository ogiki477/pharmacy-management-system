<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
//use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPasswordMail;
use App\Http\Requests\ResetPassword;

class AuthController extends Controller
{


    public function login(Request $request)
    {
        $data['meta_title'] = 'login';
        return view('auth.login',$data);
    }

    public function login_post(Request $request){

        // dd($request->all());
        if(Auth::attempt(['email'=> $request->email, 'password'=>$request->password],true)){
            if(Auth::User()->is_role == '1'){
                return redirect()->intended('admin/dashboard');
 
            }else {
            return redirect()->back()->with('error','Invalid Credentials');
             }
        }else{
        return redirect()->back()->with('error','Invalid Credentials');
       }
}

    public function forgot(){
        return view('auth.forgot');
    }
    

   



    public function forgot_post(Request $request){

        $count = User::where('email','=',$request->email)->count();
        if($count > 0){

            $user = User::where('email','=',$request->email)->first();
            $user->remember_token = Str::random(60);
            $user->save();
            
            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('success',
            'Password Reset Link Sent to your Email. Please Check Your Email.');

        }else {
            return redirect()->back()->withInput()->with('error','Email not found in the System');
        }

      
    }


    public function getReset($token){
       // dd($token);  
       if(Auth::check()){
        return redirect('admin/dashboard');
       }
       $user = User::where('remember_token','=',$token);
       if($user->count()==0){
        abort(404);
       }
       $user = $user->first();
       $data['token'] = $token;
       return view('auth.reset',$data);

    }


    public function postReset($token, ResetPassword $request){

        $user = User::where('remember_token','=',$token);
        if($user->count()==0){
            abort(404);
           }
           $user = $user->first();
           $user->password = Hash::make($request->password);
           $user->remember_token = Str::random(60);
           $user->save();
           return redirect(url('/'))->with('success','Password Reset Successfully');


    }



    public function logout(){
        Auth::logout();
        return redirect(url('/'));
    }
        
}
