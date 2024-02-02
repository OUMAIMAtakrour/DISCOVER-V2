<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Destination;
use Illuminate\Support\Facades\DB;
use App\Services\ImageService;

class PostController extends Controller
{
    private $imageService;
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }
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
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'destination_id' => 'required',
        ]);
        $post = Post::create($validatedData);

        $this->imageService->store($request->file("images"), $post);
       
      

        return redirect()->route('index')->with('success', 'Post created successfully!');
    }
    public function getPostCount()
    {
        return Post::count();
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
