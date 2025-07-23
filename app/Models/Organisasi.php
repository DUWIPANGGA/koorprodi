<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    use HasFactory;

    protected $fillable = ['nama_organisasi', 'deskripsi', 'pembina'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_organisasi')
            ->withPivot('semester')
            ->withTimestamps();
    }
}