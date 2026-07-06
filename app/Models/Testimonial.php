<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name', 'role', 'company', 'content', 'avatar', 'rating', 'is_featured', 'sort_order'
    ];

    protected $casts = ['is_featured' => 'boolean'];

    public function getAvatarUrlAttribute(): string
    {
        if ($this->avatar && file_exists(storage_path('app/public/' . $this->avatar))) {
            return asset('storage/' . $this->avatar);
        }
        $initials = urlencode(substr($this->name, 0, 1));
        return "https://ui-avatars.com/api/?name={$initials}&background=6366f1&color=fff&size=128";
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }
}
