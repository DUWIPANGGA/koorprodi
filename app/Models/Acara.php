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
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

