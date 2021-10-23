<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;

class ChangePasswordController extends Controller
{
    public function ChangePass(){
        return view('admin.body.change_password');
    }

    public function updatePass(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('success','Password changed successfull!');

        }else{
            return redirect()->back()->with('error','Password Is Invalid!');
        }
    }

    public function updateProfile(){
        if(Auth::user()){
            $user = User::find(Auth::user()->id);
            if($user){
                return view('admin.body.update_profile',compact('user'));
            }
        }
    }

    public function adminProfile(Request $request){
        $user = User::find(Auth::user()->id);
        if($user){
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->save();
            return redirect()->back()->with('success','Admin Profile updated successfully');

        }else{
            return Redirect()->back();
        }
    }



}
