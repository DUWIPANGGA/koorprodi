<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rekap extends Model
{
    use HasFactory;

    protected $table = 'rekap';

    protected $fillable = [
        'IPK',
        'dokumen',
        'semester',
        'user_id',
        'validated'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
