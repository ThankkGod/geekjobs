<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Personal;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    function index() {
        $personals = Personal::where('user_id', Auth::user()->id)->latest()->take(1)->get();
          $created = Personal::where('user_id', Auth::user()->id)
        ->where('status','created')->exists();
        $educations = Education::latest()->get();
        $works = Work::latest()->get();
       return view('user.profile.index', compact('personals', 'created', 'educations','works'));
       
    }

    function very() {
       return view('user.verify');
    }

    function resend(Request $request) {
        $user = Auth::user();

        if($user->hasVerifiedEmail()){
            toastr()->success('You have been verified login!');
            return redirect()->route('login');
        }
         $user->sendEmailVerificationNotification();
            toastr()->success('Email verification has been sent');
            return back();
    }

    // Candidate profile settings related method
    function profileSettings() {
        return view('user.profile.candidate-profile-setting');
    }

    // candidate prfile update
    
    function candidateProfileUpdate(Request $request) {
          $candidate = Auth::user();
          $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['nullable', 'string', 'lowercase', 'email', 'unique:users,email,'.$candidate->id],
            'phone' => ['required', 'string', 'max:23'],
            'address' => ['required', 'string', 'max:100'],
            'profile_pic' => ['nullable', 'image', 'mimes:jpg,jpeg,png','max:3048'],
        ]);

        if($request->hasFile('profile_pic')){
            if(File::exists($candidate->profile_pic)){
                File::delete(public_path($candidate->profile_pic));
                $candidate->delete();
            }
            $file = $request->file('profile_pic');
            $fileName = $file->store('uploads', 'dir_public');
            $filePath = '/uploads/'.$fileName;
            $candidate->profile_pic = $filePath;
        }
        $candidate->name = $request->name;
        $candidate->email = $request->email;
        $candidate->phone = $request->phone;
        $candidate->address = $request->address;
        $candidate->save();
        toastr()->success($candidate->name.' profile updated successfully');
        return back();
    }

    // Candidate change Password Related route
    function candidateChangePassword(Request $request) {
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
