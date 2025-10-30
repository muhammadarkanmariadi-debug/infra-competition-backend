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

    public function organizationRoles()
    {
        return $this->hasMany(OrganizationRole::class);
    }

    public function socialMedia()
    {
        return $this->hasMany(SocialMedia::class);
    }

    public function members()
    {
        return $this->hasMany(User::class);
    }
}
