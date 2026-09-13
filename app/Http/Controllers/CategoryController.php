<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        Gate::authorize('create', Category::class);

        $categories = Category::when($request->filled('search'), function ($query)use($request){
            $query->where(function($query)use($request){
                $query->where('name', 'LIKE', "%$request->search%");
            });
        })->latest()->paginate(5);
        return view('category.create', ['categories'=> $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:30'],
        ]);

        $category       = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name) . '-' . Str::uuid();
        $category->user_id = Auth::user()->id;
        $category->save();
        toastr()->success('Category created');
        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        
    Gate::authorize('update', $category);

         $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:30'],
        ]);

        $category->update([
        'name' => $request->name,
        // 'slug' = Str::slug($request->name) . '-' . Str::uuid();
        'user_id' => Auth::user()->id,
        ]);
        toastr()->success('Category updated');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Gate::authorize('delete', $category);
        $category->delete();
        toastr()->success('Category deleted');
        return back();
    }
}
