<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $uploads='/storage/photos/';
    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function getPathAttribute($photo)
    {
        return $this->uploads.$photo;
   }
}
