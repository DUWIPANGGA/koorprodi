<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'tahun', 'aktif'];

    public function pengurus()
    {
        return $this->hasMany(Pengurus::class);
    }

    // Scope untuk periode aktif
    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }
}