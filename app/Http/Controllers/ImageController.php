<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
// app/Http/Controllers/ImageController.php



class ImageController extends Controller
{
    public function getImageCount()
    {
        return Image::count();
    }


    public function showStatisticsImage()
    {
        // Retrieve all posts
        $posts = Post::all();

        // Count the number of images for each post
        $postsWithImageCount = [];
        foreach ($posts as $post) {
            $imageCount = Image::where('post_id', $post->id)->count();
            $post->imageCount = $imageCount;
            $postsWithImageCount[] = $post;
        }

        return view('statistics', [
            'postsWithImageCount' => $postsWithImageCount,
        ]);
    }
}
