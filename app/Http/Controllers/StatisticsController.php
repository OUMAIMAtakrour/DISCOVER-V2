<?php
// app/Http/Controllers/StatisticsController.php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\ImageController;

class StatisticsController extends Controller
{
    public function index()
    {
        // Use methods from other controllers to get data
        $destinationCount = app(DestinationController::class)->getDestinationCount();
        $imageCount = app(ImageController::class)->getImageCount();
        $postCount = app(PostController::class)->getPostCount();

        return view('statistics', [
            'destinationCount' => $destinationCount,
            'imageCount' => $imageCount,
            'postCount'=>$postCount,
        ]);
    }
}
