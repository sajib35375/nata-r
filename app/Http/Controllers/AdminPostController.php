<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function allPosts(){
        $all_post = Post::latest()->get();
        return view('admin.post.all_posts',compact('all_post'));
    }
}
