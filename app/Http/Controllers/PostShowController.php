<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Savejob;
use Illuminate\Support\Facades\Auth;

class PostShowController extends Controller
{
    public function showIndex(Post $post)
    {
        $post->with('category');
        $alreadyApplied = $post->users()
            ->where('user_id', Auth::id())
            ->exists();

        $totalNumberApplicant = $post->users()->count();
        $savedjob             = Savejob::where('user_id', Auth::user()->id)->where('post_id', $post->id)->exists();
        $isExpired            = $post->status === 'expired';
        
        return view('showpost.index', compact('post', 'alreadyApplied', 'totalNumberApplicant', 'savedjob', 'isExpired'));

    }
}
