<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domisili extends Model
{
    use HasFactory;

    protected $table = 'domisili';
    protected $fillable = [
        'mahasiswa_id',
        'alamat_lengkap',
        'latitude',
        'longitude',
        'status',
        'keterangan'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(User::class);
    }

    public function fotos()
    {
        return $this->hasMany(DomisiliFoto::class);
    }
}