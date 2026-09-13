<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $works =Work::latest()->get();
        return view('work.index', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Work::class);
        return view('work.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'work_name' => ['bail', 'required', 'string', 'max:150'],
            'company_name'      => ['bail', 'required', 'string', 'max:200'],
            'start_date'  => ['bail', 'required', 'date'],
            'end_date'  => ['bail', 'required', 'date'],
            'work_description' => ['bail','string', 'max:400'],
        ]);

        $work                  = new Work();
        $work ->work_name = $request->work_name;
        $work ->company_name      = $request->company_name;
        $work ->start_date  = $request->start_date;
        $work ->end_date  = $request->end_date;
        $work ->work_description  = $request->work_description;
        $work ->slug             = Str::slug($request->work_name) . Str::uuid();
        $work ->user_id          = Auth::user()->id;
        $work ->save();
        toastr()->success('Work details created');
        return redirect()->route('works.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Work $work)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Work $work)
    {
        return view('work.edit', compact('work'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Work $work)
    {
         Gate::authorize('update', $work);
             $request->validate([
            'work_name' => ['bail', 'required', 'string', 'max:150'],
            'company_name'      => ['bail', 'required', 'string', 'max:200'],
            'start_date'  => ['bail', 'required', 'date'],
            'end_date'  => ['bail', 'required', 'date'],
            'work_description' => ['bail','string', 'max:400'],
        ]);

        $work  ->upadte([
         'work_name' => $request->work_name,
        'company_name'      => $request->company_name,
        'start_date'  => $request->start_date,
        'end_date'  => $request->end_date,
        'work_description'  => $request->work_description,
        'user_id'          => Auth::user()->id,
        ]);
        toastr()->success('Work details updated');
        return redirect()->route('works.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Work $work)
    {
        Gate::authorize('delete', $work);
        $work->delete();
        toastr()->success('Work deleted successully');
        return back();
    }
}
