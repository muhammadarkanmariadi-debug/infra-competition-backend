<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Alumni extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'photo',
        'angkatan',
        'current_job',
        'company',
        'quote',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($alumni) {
            if (empty($alumni->slug)) {
                $alumni->slug = Str::slug($alumni->name);

                // Ensure slug is unique
                $originalSlug = $alumni->slug;
                $count = 1;
                while (static::where('slug', $alumni->slug)->exists()) {
                    $alumni->slug = $originalSlug . '-' . $count;
                    $count++;
                }
            }
        });

        static::updating(function ($alumni) {
            if ($alumni->isDirty('name') && empty($alumni->slug)) {
                $alumni->slug = Str::slug($alumni->name);

                // Ensure slug is unique
                $originalSlug = $alumni->slug;
                $count = 1;
                while (static::where('slug', $alumni->slug)->where('id', '!=', $alumni->id)->exists()) {
                    $alumni->slug = $originalSlug . '-' . $count;
                    $count++;
                }
            }
        });
    }
}
