<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $guarded = ['id'];


    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id');
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function generation()
    {
        return $this->belongsTo(Generation::class, 'generation_id');
    }
    public function expertise()
    {
        return $this->belongsTo(Expertise::class, 'expertise_id');
    }
}
