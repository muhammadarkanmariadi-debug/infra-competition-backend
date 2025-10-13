<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $guarded = ['id'];


    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
