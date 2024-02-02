<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Destination;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $destinations = Destination::all();
        
        return view('index', [
            'posts' => $posts,
            'destinations' => $destinations,
        ]);
    }
    public function create()
    { $destinations = Destination::all();

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

            // Commit the transaction
            DB::commit();
        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            
            return redirect()->back()->with('error', 'Error creating post.');
        }

        // Redirect to the index route with success message
        return redirect()->route('index')->with('success', 'Post created successfully!');
    }
    public function filterPosts(Request $request)
    {
        $destinationId = $request->input('id');
        
        $posts = $destinationId
            ? Post::where('id', $destinationId)->get()
            : Post::all();
    
        return view('partials.posts', ['posts' => $posts])->render();
    }
    

}
