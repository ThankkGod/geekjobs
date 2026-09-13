<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\adminCreateAgentStoreRequest;
use App\Mail\AgentRegistrationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AgentsController extends Controller
{
    const ROLE_AGENT = 'agent';
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::where('role', ['agent'])
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('name', 'LIKE', "%$request->search%")
                        ->orWhere('phone', 'LIKE', "%$request->search%")
                        ->orWhere('email', 'LIKE', "%$request->search%")
                        ->orWhere('status', 'LIKE', "%$request->search%");
                });
            });
        return view('admin.agent.index', ['users' => $users->latest()->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', User::class);
        return view('admin.agent.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(adminCreateAgentStoreRequest $request)
    {
        $password = Str::random(12);
        // dd($generatePassword);
        $user           = new User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = bcrypt($password);
        $user->role     = self::ROLE_AGENT;
        $user->save();
        Mail::to($user->email)->queue(new AgentRegistrationMail($user, $password));
        toastr()->success('Agent created successfully');
        return redirect()->route('agents.show', $user->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user =Auth::user();
        Gate::authorize('view', $user);
        $user = User::where('role', 'agent')->findOrFail($id);
        // dd($user);
        return view('admin.agent.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::where('role', 'agent')->findOrFail($id);
        return view('admin.agent.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Auth::user();
        Gate::authorize('update', $user);
        $request->validate([
            'name'  => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'max:100', 'email', 'unique:users,email,' . $id],
        ]);
        $user        = User::where('role', 'agent')->findOrFail($id);
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->save();
        toastr()->success('Agent updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();
        Gate::authorize('delete', $user);
        $user = User::where('role', 'agent')->findOrFail($id);
        File::delete(public_path($user->profile_pic));
        $user->delete();
        toastr()->success('Agent delated succuessfully');
        return back();
    }

    // Admin change Agent status related method
    public function adminAgentChangeStatus(Request $request, $id)
    {
        $user         = User::findOrFail($id);
        $user->status = $request->has('status') ? 'unblock' : 'block';
        $user->save();
        toastr()->success('Agent status changed successfully');
        return back();
    }
}
