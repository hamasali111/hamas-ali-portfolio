<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'title', 'company', 'location', 'start_date', 'end_date',
        'is_current', 'description', 'type', 'sort_order'
    ];

    protected $casts = [
        'is_current' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function getDateRangeAttribute(): string
    {
        $start = $this->start_date->format('M Y');
        $end = $this->is_current ? 'Present' : ($this->end_date ? $this->end_date->format('M Y') : 'Present');
        return "$start — $end";
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderByDesc('start_date');
    }
}
