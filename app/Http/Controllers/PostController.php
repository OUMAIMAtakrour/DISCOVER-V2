<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Image;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('index', ['posts' => $posts]);
    }
    public function create()
    {
    
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        try {
            
            $imagePath = $request->file('image')->store('/uploads', 'public');
    
            
            $post = new Post([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
            ]);
            $post->save();
    
            
            $image = new Image([
                'url' => $imagePath,
                'post_id' => $post->id, 
            ]);
            $image->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error creating post.');
        }
    
       
       
    
        return redirect('/')->with('success', 'Post created successfully!');
    }
}