<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Image;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view("index", ["posts" => Post::with('images')->get()]);
    }
    public function create()
    {
        return view("create");
    }
    public function store(Request $request)
    {
    
        $incomingFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
         ]);
       
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['description'] = strip_tags($incomingFields['description']);
        $imagePath = $request->file('image')->store('uploads', 'public');
        $incomingFields['image'] = $imagePath;
        Post::create($incomingFields);
        return redirect('/');
    }
}
