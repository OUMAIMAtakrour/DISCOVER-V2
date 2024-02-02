<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ["title", "description"];

    // protected $with = ["images"];

    public function images(){
        return $this->hasMany(Image::class);
    }
    public function destination()
    {
        return $this->belongsTo(DestinationModel::class);
    }
}
