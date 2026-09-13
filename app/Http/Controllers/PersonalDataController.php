<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class PersonalDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $personals = Personal::where('user_id', Auth::user()->id)->latest()->get();
          $created = Personal::where('user_id', Auth::user()->id)
        ->where('status','created')->exists();
        return view('personal.index', compact('personals', 'created'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        return view('personal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        Gate::authorize('create', Personal::class);
         $request->validate([
            'title' => ['bail', 'required', 'string', 'max:100'],
            'nationality' => ['bail', 'required', 'string', 'max:20'],
            'state' => ['bail', 'required', 'string', 'max:20'],
            'language' => ['bail', 'required', 'string', 'max:30'],
            'career_objective' => ['bail', 'required', 'string', 'max:2048'],
        ]);
        $created = Personal::where('user_id', Auth::user()->id)
        ->where('status','created')->exists();

        if($created){
            toastr()->error('You have already created');
            return back();
        }else{
            
        $personal  = new Personal();
        $personal->profession_name = $request->title;
        $personal->nationality = $request->nationality;
        $personal->state = $request->state;
        $personal->language = $request->language;
        $personal->career_objective = $request->career_objective;
        $personal->slug =Str::slug($request->title).Str::uuid();
        $personal->user_id =Auth::user()->id;
        $personal->save();
        toastr()->success('Personal profile detail created');
        return redirect()->route('personals.index');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Personal $personal)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personal $personal)
    {
        return view('personal.edit', compact('personal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Personal $personal)
    {
        $request->validate([
            'title' => ['bail', 'required', 'string', 'max:100'],
            'nationality' => ['bail', 'required', 'string', 'max:20'],
            'state' => ['bail', 'required', 'string', 'max:20'],
            'language' => ['bail', 'required', 'string', 'max:30'],
            'career_objective' => ['bail', 'required', 'string', 'max:2048'],
        ]);


        Gate::authorize('update', $personal);
        $personal->update([
        'profession_name' => $request->title,
        'nationality' => $request->nationality,
        'state' => $request->state,
        'language' => $request->language,
        'career_objective' => $request->career_objective,
        // 'slug' =>Str::slug($request->title).'-',
        'user_id' => Auth::user()->id,
        ]);

        toastr()->success('Personal profile detail updated');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Personal $personal)
    {
        // dd($personal->slug);
        Gate::authorize('delete', $personal);
        $personal->delete();
        toastr()->success('Deleted successfully');
        return back();
    }
}
