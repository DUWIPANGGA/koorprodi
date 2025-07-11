<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedirectLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'short_url',
        'destination_url',
        'title',
        'description',
        'user_id',
        'clicks',
        'expires_at',
        'is_active'
    ];

    protected $dates = ['expires_at'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isExpired()
    {
        return $this->expires_at && now()->greaterThan($this->expires_at);
    }

    public function isValid()
    {
        return $this->is_active && !$this->isExpired();
    }

    public function incrementClicks()
    {
        $this->increment('clicks');
    }
}