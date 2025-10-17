<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $guarded = ['id'];
    public function expertises()
    {
        return $this->hasMany(Expertise::class);
    }
}
