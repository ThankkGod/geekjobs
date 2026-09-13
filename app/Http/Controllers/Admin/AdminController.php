<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUpdateProfileRequest;
use App\Models\General;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    function index() {
        return view('admin.index');
    }

    function indexAdminProfile(){
        return view('admin.profile.index');
    }

    function adminEditProfile() {
        $applicationGenerals = General::get();
        return view('admin.profile.edit', compact('applicationGenerals'));
    }

    function adminUpdateProfile(Request $request) {
        $user = Auth::user();
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['nullable', 'string', 'lowercase', 'email', 'unique:users,email,'.$user->id],
            'phone' => ['required', 'string', 'max:23'],
            'address' => ['required', 'string', 'max:100'],
            'profile_pic' => ['nullable', 'image', 'mimes:jpg,jpeg,png','max:3048'],
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

    // Admin Change password related method

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
