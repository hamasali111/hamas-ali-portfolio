<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name', 'description', 'image', 'category', 'url',
        'github_url', 'technologies', 'is_featured', 'sort_order'
    ];

    protected $casts = ['is_featured' => 'boolean'];

    public function getTechnologiesArrayAttribute(): array
    {
        if (!$this->technologies) return [];
        return array_map('trim', explode(',', $this->technologies));
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->image && file_exists(storage_path('app/public/' . $this->image))) {
            return asset('storage/' . $this->image);
        }
        return "https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=600&q=80";
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderByDesc('created_at');
    }
}
