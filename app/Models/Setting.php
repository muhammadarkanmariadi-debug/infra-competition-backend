<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = ['id'];

    public function headmaster()
    {
        return $this->hasOne(User::class, 'headmaster_id');
    }

    
}
