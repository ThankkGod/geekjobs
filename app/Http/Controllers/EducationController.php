<?php
namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educations = Education::latest()->get();
        return view('education.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Education::class);
        return view('education.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'certificate_name' => ['bail', 'required', 'string', 'max:150'],
            'school_name'      => ['bail', 'required', 'string', 'max:200'],
            'school_location'  => ['bail', 'required', 'string', 'max:200'],
            'graduation_year'  => ['bail', 'required', 'date'],
        ]);

        $education                   = new Education();
        $education->certificate_name = $request->certificate_name;
        $education->school_name      = $request->school_name;
        $education->school_location  = $request->school_location;
        $education->graduation_year  = $request->graduation_year;
        $education->slug             = Str::slug($request->title) . Str::uuid();
        $education->user_id          = Auth::user()->id;
        $education->save();
        toastr()->success('School details created');
        return redirect()->route('educations.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Education $education)
    {
        return view('education.edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Education $education)
    {
        Gate::authorize('update', $education);
        $request->validate([
            'certificate_name' => ['bail', 'required', 'string', 'max:150'],
            'school_name'      => ['bail', 'required', 'string', 'max:200'],
            'school_location'  => ['bail', 'required', 'string', 'max:200'],
            'graduation_year'  => ['bail', 'required', 'date'],
        ]);

        $education->update([
            'certificate_name' => $request->certificate_name,
            'school_name'      => $request->school_name,
            'school_location'  => $request->school_location,
            'graduation_year'  => $request->graduation_year,
            'user_id'          => Auth::user()->id,
        ]);
        toastr()->success('School details updated');
        return redirect()->route('educations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education)
    {
        Gate::authorize('delete', $education);
        $education->delete();
        toastr()->success('Deleted successfully');
        return back();
    }
}
