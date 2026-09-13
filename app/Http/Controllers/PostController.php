<?php

namespace App\Http\Controllers;

use App\Http\Requests\jobStoreRequest;
use App\Http\Requests\postUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostController extends Controller
{
    const POST_STATUS ='available';
    const POST_PUBLISHED_AT ='published';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['category'])->latest()->where('user_id', Auth::user()->id)->get();
        // dd($posts);
            return view('job.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::latest()->get();
        return view('job.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(jobStoreRequest $request)
    {
        $post = new Post();
        if($request->hasFile('feature_image')){
            $file = $request->file('feature_image');
            $fileName = $file->store('', 'feature_public');
            $filePath ='/features/'.$fileName;
            $post->feature_image =$filePath;
        }
        $post->title= $request->title;
        $post->gender= $request->gender;
        $post->responsibilities= $request->responsibilities;
        $post->requirement= $request->requirement;
        $post->job_type= $request->job_type;
        $post->experince_level= $request->experince_level;
        $post->salary= $request->salary;
        $post->location= $request->location;
        $post->vacancy= $request->vacancy;
        $post->category_id= $request->category_id;
        $post->application_deadline= $request->application_deadline;
        $post->slug= Str::slug($request->title).'-'.Str::uuid();
        $post->description= $request->description;
        $post->status= self::POST_STATUS;
        $post->published_at= self::POST_PUBLISHED_AT;
        $post->job_expired= now()->addMonth();
        $post->user_id= Auth::user()->id;
        $post->save();

        // $post->users()->attach()
        toastr()->success('Job created successfully');
        return redirect()->route('posts.show', $post->slug);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('job.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $post->with(['category'])->get();
        return view('job.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(postUpdateRequest $request, Post $post)
    {
         
        if($request->hasFile('feature_image')){
            if(File::exists('feature_image')){
                File::delete(public_path($post->feature_image));
                $post->delete();
            }
            $file = $request->file('feature_image');
            $fileName = $file->store('', 'feature_public');
            $filePath ='/features/'.$fileName;
            $post->feature_image =$filePath;
        }
        $post->update([
        'title'=> $request->title,
         'gender'=> $request->gender,
        'responsibilities'=> $request->responsibilities,
        'requirement'=> $request->requirement,
        'job_type'=> $request->job_type,
        'experince_level'=> $request->experince_level,
        'salary'=> $request->salary,
        'location'=> $request->location,
        'vacancy'=> $request->vacancy,
        'category_id'=> $request->category_id,
        'application_deadline'=> $request->application_deadline,
        'description'=> $request->description,
        'status'=> self::POST_STATUS,
        'published_at'=> self::POST_PUBLISHED_AT,
        'job_expired'=> now()->addMonth(),
        'user_id'=> Auth::user()->id,
        ]);
        toastr()->success('Job updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        
    if(File::exists('feature_image')){
                File::delete(public_path($post->feature_image));
            }
            $post->delete();
            toastr()->success('Job deleted successfully');
            return back();

    }

       //Job Status related method
    public function jobChangePublish(Request $request, Post $post)  {
        $post->update([
        'published_at' => $request->has('published_at')?'published':'pending',    
        ]);
    toastr()->success('Job status changed successfully');
    return back();
        
    }

    //Job Status related method
    public function jobStatus(Request $request, Post $post)  {
        $post->update([
        'status' => $request->has('status')?'available':'expired',    
        ]);
    toastr()->success('Job status changed successfully');
    return back();
        
    }
}
