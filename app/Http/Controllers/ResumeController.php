<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ResumeController extends Controller
{
    public function resumeStore(Request $request)
    {
        $request->validate([
            'resume' => ['required', 'file', 'mimes:pdf', 'max:4048'],
        ]);

        $userResume = Auth::user();

        if ($request->hasFile('resume')) {
            if (File::exists('resume')) {
                File::delete(public_path($userResume->resume));
                $userResume->delete();
            }

            $fileResume         = $request->file('resume');
            $fileNameResume     = $fileResume->store('', 'public');
            $fileResumePath     = '/cvs/' . $fileNameResume;
            $userResume->resume = $fileResumePath;
            $userResume->save();
              toastr()->success('CV/Resume uploaded successfully');
           return back();
        }

    }
}
