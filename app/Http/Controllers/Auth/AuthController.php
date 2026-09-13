<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\authStoreRequest;
use App\Mail\CandidateRegistrationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
  

    // Register related method
    function createRegister() {
        return view('auth.create-register');
    }

    // Login related method
    function login() {
        return view('auth.login');
    }

    function authCandidateStore(authStoreRequest $request) {
        // dd($request->all());
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
         Auth::login($user);
        
        $user->sendEmailVerificationNotification();
        Mail::to($user->email)->queue(new CandidateRegistrationMail($user));

       toastr()->success('Candidate account created successfully');
        return redirect()->route('verification.notice');
    }

    function authLogin(Request $request) {
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $credential= $request->only('email', 'password');
        $remember_me = $request->has('remember')?'Checked':'';

        if(Auth::attempt($credential, $remember_me)){

            if($request->user()->status === 'block'){
                Auth::logout();
                toastr()->error('Account supended Contact the Administrator');
                $request->session()->regenerate();  
                return redirect()->route('login');
            }
            
            if($request->user()->role === 'admin'){
               $request->session()->regenerate();  
               return redirect()->intended('/admin/dashboard');
            }if($request->user()->role === 'agent'){
                $request->session()->regenerate();  
                return redirect()->intended('/agent/dashboard');
            }
            $request->session()->regenerate();  
            return redirect()->route('home.index');
            
        }else{
            toastr()->error('Invalid credentials');
            return back();
    }
    }

    // Related logout method
    function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home.index');
    }
}
