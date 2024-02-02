<?php

namespace App\Services;
use Illuminate\Support\Str;
use App\Models\Image;
use App\Models\Post;

/**
 * Class ImageService.
 */
class ImageService
{
    public function store($images, Post $post)
    {
        foreach ($images as $image) {
            $imageName = $this->moveImage($image);
            Image::create([
                "url" => $imageName,
                "post_id" => $post->id
            ]);
        }

    }

    public function moveImage($image)
    {
        $imageName = Str::random(10) . time() . "." . $image->extension();
        $image->move(public_path('images/storage'), $imageName);
        return $imageName;
    }
}