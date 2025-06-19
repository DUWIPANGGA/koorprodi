<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    use HasFactory;

    protected $table = 'acara';

    protected $fillable = [
        'nama_acara',
        'tanggal',
        'lama_acara',
        'start',
        'user_id',
        'deskripsi',
        'warna',
        'lokasi'
    ];

    protected $casts = [
        'tanggal' => 'datetime',
        'start' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Method untuk mendapatkan warna acara
    public function getColor()
    {
        return $this->warna ?? '#3b82f6'; // Default blue-500
    }

    // Method untuk format tanggal
    public function getFormattedDate()
    {
        return $this->tanggal->format('d M Y');
    }
}