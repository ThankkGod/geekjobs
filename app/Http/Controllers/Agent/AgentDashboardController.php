<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AgentDashboardController extends Controller
{
    function index() {
        return view('agent.index');
    }
    function profile() {
        return view('agent.profile.index');
    }
    function profileEdit() {
        return view('agent.profile.edit');
    }

    function profileUpdate(Request $request) {

     $user = Auth::user();
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['nullable', 'string', 'lowercase', 'email', 'unique:users,email,'.$user->id],
            'phone' => ['required', 'string', 'max:23'],
            'address' => ['required', 'string', 'max:100'],
            'profile_pic' => ['nullable', 'image', 'mimes:jpg,jpeg,png','max:3048'],
        ],[
            'name.required'=>'Please enter the Company Full Name',
            'email.required'=>'Please Company Email',
            'phone.required'=>'Please Company phone number required',
            'address.required' => 'Please enter the company address',
        ]);

        

        if($request->hasFile('profile_pic')){
            if(File::exists($user->profile_pic)){
                File::delete(public_path($user->profile_pic));
                $user->delete();
            }
            $file = $request->file('profile_pic');
            $fileName = $file->store('uploads', 'dir_public');
            $filePath = '/uploads/'.$fileName;
            $user->profile_pic = $filePath;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        toastr()->success($user->name.' profile updated successfully');
        return back();
    }
    // Agent change password related method
    function changePwd(Request $request) {
        $request->validate([
            'current_password'=> ['required', 'string', 'min:8', 'max:60'],
            'password'=> ['required', 'string', 'min:8', 'max:60', 'confirmed'],
            'password_confirmation'=> ['required', 'string', 'min:8', 'max:60'],
        ]);
        $user = Auth::user();
        if(!Hash::check($request->current_password, $user->password)){
            toastr()->error('Current password do not match');
            return back();
        }else{
            $user->password= bcrypt($request->password);
            $user->save();
            toastr()->success('Password changed successfully');
            return back();
        }
    } 
}
