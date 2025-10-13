<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GenerationGallery extends Model
{
    protected $guarded = ['id'];


    public function generation()
    {
        return $this->belongsTo(Generation::class, 'generation_id');
    }
}
