<?php
namespace App\Http\Controllers;

use App\Models\Destination;

class DestinationController extends Controller
{
    public function getDestinationCount()
    {
        return Destination::count();
    }
}
// app/Http/Controllers/DestinationController.php



