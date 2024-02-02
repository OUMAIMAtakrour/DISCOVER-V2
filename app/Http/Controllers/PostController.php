<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Destination;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $destinations = Destination::all();
        // $destinations = Post::all();

        return view('index', [
            'posts' => $posts,
            'destinations' => $destinations,
        ], compact('destinations'));
    }
    public function create()
    {
        $destinations = Destination::all();

        return view('create', [
            'destinations' => $destinations,
        ]);
    }

  

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'des_name' => 'required',
        ]);
    
        DB::beginTransaction(); 
    
        try {
            
            $imagePath = $request->file('image')->store('uploads', 'public');
    
           
            $destination = Destination::firstOrCreate(['des_name' => $request->input('des_name')]);
    
          
            $post = new Post([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
            ]);
            $destination->posts()->save($post);
    
            
            $image = new Image([
                'url' => $imagePath,
                'post_id' => $post->id,
            ]);
            $image->save();
    
            DB::commit(); 
        } catch (\Exception $e) {
            dd($e->getMessage());  
            DB::rollBack();  
            return redirect()->back()->with('error', 'Error creating post.');
        }
    
        return redirect()->route('index')->with('success', 'Post created successfully!');
    }
    
    
    
    public function filterPosts(Request $request)
    {
        $destinationId = $request->input('id');
        $order = $request->input('order');
    
        $query = Post::query();
    
        if ($destinationId) {
            $query->where('id', $destinationId);
        }
    
        if ($order === 'latest') {
            $query->orderBy('id', 'desc');
        } elseif ($order === 'oldest') {
            $query->orderBy('id', 'asc');
        }
    
        $posts = $query->get();
    
        return view('partials.posts', ['posts' => $posts])->render();
    }
    
    
    
}
