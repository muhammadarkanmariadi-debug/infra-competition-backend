<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogGallery extends Model
{
    protected $guarded = ['id'];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
