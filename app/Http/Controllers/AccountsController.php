<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AccountsController extends Controller
{
    public function accounts(Request $request){
        //echo("yoo");
        $data['getRecord'] = User::find(Auth::user()->id);
        $data['meta_title'] = 'Account Settings';
        return view('admin.my_account.update',$data);
        
    }

    public function accounts_update(Request $request){
        //dd('yoo');
        $this->validate($request,[
            'email' => 'required|unique:users,email,'.Auth::user()->id
        ]);

        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        if(!empty($request->password)){ 
        $data->password = Hash::make($request->password);
        }
       //profile_picture
       if(!empty($request->file('profile_picture'))){
        if(!empty($data->profile_picture) && file_exists('uploads/profile/' . $data->profile_picture)){
            unlink('uploads/profile/' . $data->profile_picture );
        }
        $file = $request->file('profile_picture');
        $randomStr = Str::random(30);
        $filename = $randomStr .'.'.$file->getClientOriginalExtension();
        $file->move('uploads/profile/',$filename);
        $data->profile_picture = $filename;
       }
       //end profile_picture

        $data->save();

        return redirect('admin/my_account')->with('success','Profile Updated Successfully');    

    }
}
