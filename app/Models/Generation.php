<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Generation extends Model
{
    protected $guarded = ['id'];

    public function generationgallery()
    {
        return $this->hasMany(GenerationGallery::class);
    }
}
