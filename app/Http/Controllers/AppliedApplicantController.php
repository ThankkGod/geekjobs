<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppliedApplicantController extends Controller
{
    function appliedApplcant() {
        $appliedApplicants = Post::where('user_id', Auth::user()->id)->get();
        // $userDetails = User::with(['personal', 'works','educations',])->where('user_id', Auth::user()->id)->get();
        return view('applicant.index', compact('appliedApplicants',));
    }

    function appliedApplicantShow(Post $post) {
        $post->with(['users'])->get();
        return view('applicant.show', compact('post'));
    }
}
