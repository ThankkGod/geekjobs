<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    function index() {
        // Post job 
        // $jobs = Post::with(['user'])->where(['status', 'expired'])->latest()->get();
       

          // Category filter
          $categories = Category::with(['posts'])->latest()->get();

        $jobs = Post::with(['user'])->where( 'job_expired', '>=',  Carbon::today())->latest()->get();
         $jobsCount = Post::with(['user'])->where( 'job_expired', '>=',  Carbon::today())->count();

         $jobsSearches = Post::query();
        // $jobsSearches->when(Request('search'), function($query){
        //     $query->where('title', 'LIKE', "%".Request('search'). "%");
        // })->with(['user'])->where( 'job_expired', '>=',  Carbon::today())->latest()->get();
       
         $galleries = Gallery::get();
  $ourJobs = Post::with(['user'])->where( 'job_expired', '>=',  Carbon::today())->orderBy('title','DESC')->get();
        return view('home.index', compact('jobs', 'categories','jobsCount', 'galleries','ourJobs'));
    }
}
