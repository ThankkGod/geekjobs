<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Savejob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavejobController extends Controller
{

    function index() {
        $userSaveJobs = Savejob::with(['user', 'post'])->where('user_id', Auth::user()->id)->get();
        return view('savejob.index', compact('userSaveJobs'));
    }
    function create(Request $request, Post $post){
        
        Savejob::create([
            'user_id' => Auth::id(),
            'post_id' => $post->id,
        ]);
        toastr()->success('Job saved successfully');
        return back();
    }

    function destroy(Request $request, $id){
        $savejob = Savejob::findOrFail($id);
        $savejob->delete();
        toastr()->success('Removed successfully');
        return back();
    }
    
}
