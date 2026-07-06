<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['name', 'email', 'subject', 'message', 'is_read', 'is_replied'];

    protected $casts = ['is_read' => 'boolean', 'is_replied' => 'boolean'];

    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }
}
