<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationRole extends Model
{
    protected $guarded = ['id'];

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id');
    }
}
