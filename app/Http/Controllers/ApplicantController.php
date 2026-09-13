<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends Controller
{
    function apply(Request $request, Post $post) {
       

       $user = Auth::user();


         if($user->resume){ 
            $user->posts()->syncWithoutDetaching($post);
        toastr()->success('You applied to this job successfully');
     return back();
    
    }
    else{   
    toastr()->error('Please upload your CV/resume');
            return back();
    }
     
    }

    }
   

