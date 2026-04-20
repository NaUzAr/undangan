<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'address',
        'slug',
        'has_opened',
        'opened_at',
        'wa_sent',
        'event_type',
    ];

    protected $casts = [
        'has_opened' => 'boolean',
        'wa_sent' => 'boolean',
        'opened_at' => 'datetime',
    ];

    /**
     * Generate unique slug from name
     */
    public static function generateSlug(string $name): string
    {
        $baseSlug = Str::slug($name);
        $slug = $baseSlug;
        $counter = 1;

        while (self::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
