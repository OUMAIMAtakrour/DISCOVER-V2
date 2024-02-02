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
    
        DB::beginTransaction();  // Begin a database transaction
    
        try {
            // Upload image
            $imagePath = $request->file('image')->store('/uploads', 'public');
    
            // Create or retrieve destination
            $destination = Destination::firstOrCreate(['des_name' => $request->input('des_name')]);
    
            // Create post and associate with the destination
            $post = new Post([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
            ]);
            $destination->posts()->save($post);
    
            // Create image record with foreign key reference to post
            $image = new Image([
                'url' => $imagePath,
                'post_id' => $post->id,
            ]);
            $image->save();
    
            DB::commit();  // Commit the transaction if all operations succeed
        } catch (\Exception $e) {
            dd($e->getMessage());  
            DB::rollBack();  // Rollback the transaction if an exception occurs
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
