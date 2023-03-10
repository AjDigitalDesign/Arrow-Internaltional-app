<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
   public function index()
   {
       $posts = Post::withCount('comments')->paginate(6);

       return view('posts.index', compact( 'posts'));
   }

   public function show(Post $post) {
       return view('posts.single', compact('post') );
   }
}
