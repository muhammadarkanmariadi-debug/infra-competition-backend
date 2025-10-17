<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EkstrakulikulerGallery extends Model
{
    protected $guarded = ['id'];


    public function ekstrakulikuler()
    {
        return $this->belongsTo(Ekstrakulikuler::class);
    }
}
