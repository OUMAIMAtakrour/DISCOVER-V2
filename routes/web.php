<?php

use App\Http\Controllers\DestinationController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatisticsController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PostController::class, 'index'])->name('index');

Route::get('/create', [PostController::class,"create"]);
Route::post('/create', [PostController::class,"store"]);
Route::get('/filter-posts', [PostController::class, 'filterPosts'])->name('filter-posts');
Route::get('/statistics', [
    StatisticsController::class, 'index'
])->name('statistics');