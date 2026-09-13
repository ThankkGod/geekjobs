<?php
namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class GalleryController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::where('user_id', Auth::user()->id)->get();
        return view('gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Gallery::class);
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'gallery_title'       => ['required', 'string', 'max:120'],
            'gallery_description' => ['required', 'string', 'max:200'],
            'gallery_image'       => ['required', 'image', 'mimes:png,jpeg,jpg', 'max:3048'],
        ]);
        $gallery = Gallery::where('user_id', Auth::user()->id)->where('status', 'created')->exists();
        if ($gallery) {
            toastr()->error('You can\'t create another Gallery');
            return redirect()->route('gallery.index');
        } else {
            if ($request->hasFile('gallery_image')) {
                $file                   = $request->file('gallery_image');
                $fileName               = $file->store('', 'gallery_public');
                $filePath               = '/gallery/' . $fileName;
                // $gallery->gallery_image = $filePath;
            }
            Gallery::create([
                'gallery_title' => $request->gallery_title,
                'gallery_image' => $filePath,
                'gallery_description' => $request->gallery_description,
                'slug' => Str::slug($request->gallery_title) . '.' . Str::uuid(),
                'user_id' => Auth::user()->id,
                // 'status' => self::GALLERY_STATUS,
            ]);
             toastr()->success('Gallery created successfully');
        return redirect()->route('gallery.index');
        }
       

    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
         return view('gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        Gate::authorize('update', $gallery);
           $request->validate([
            'gallery_title'       => ['required', 'string', 'max:120'],
            'gallery_description' => ['required', 'string', 'max:200'],
            'gallery_image'       => [ 'image', 'mimes:png,jpeg,jpg', 'max:3048'],
        ]);

         if ($request->hasFile('gallery_image')) {
            if(File::exists('gallery_image')){
                File::delete(public_path($gallery->gallery_image));
                $gallery->delete();
            }
            
                $file                   = $request->file('gallery_image');
                $fileName               = $file->store('', 'gallery_public');
                $filePath               = '/gallery/' . $fileName;
                $gallery->gallery_image = $filePath;
            }
            $gallery->update([
                'gallery_title' => $request->gallery_title,
                // 'gallery_image' => $filePath,
                'gallery_description' => $request->gallery_description,
                // 'slug' => Str::slug($request->gallery_title) . '.' . Str::uuid(),
                'user_id' => Auth::user()->id,
                // 'status' => self::GALLERY_STATUS,
            ]);
             toastr()->success('Gallery updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        Gate::authorize('delete', $gallery);
        File::delete(public_path($gallery->gallery_image));
        $gallery->delete();
        toastr()->success('Deleted successfully');
        return back();
    }
}
