<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomisiliFoto extends Model
{
    use HasFactory;

    protected $table = 'domisili_foto';
    protected $fillable = ['domisili_id', 'path'];

    public function domisili()
    {
        return $this->belongsTo(Domisili::class);
    }
}